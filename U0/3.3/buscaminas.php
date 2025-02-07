<?php
session_start();

// Configuración del tablero
$rows = 10; // Número de filas
$cols = 10; // Número de columnas
$numMines = 15; // Número de minas

// Función para inicializar el tablero
function initializeBoard($rows, $cols) {
    $board = [];
    for ($i = 0; $i < $rows; $i++) {
        $board[$i] = array_fill(0, $cols, 0);
    }
    return $board;
}

// Función para colocar minas
function placeMines(&$board, $rows, $cols, $numMines) {
    $placedMines = 0;
    while ($placedMines < $numMines) {
        $randRow = rand(0, $rows - 1);
        $randCol = rand(0, $cols - 1);
        if ($board[$randRow][$randCol] !== 'M') {
            $board[$randRow][$randCol] = 'M';
            $placedMines++;
        }
    }
}

// Función para calcular números alrededor de minas
function calculateNumbers(&$board, $rows, $cols) {
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($board[$i][$j] === 'M') {
                continue;
            }
            $minesCount = 0;
            for ($x = -1; $x <= 1; $x++) {
                for ($y = -1; $y <= 1; $y++) {
                    $newRow = $i + $x;
                    $newCol = $j + $y;
                    if ($newRow >= 0 && $newRow < $rows && $newCol >= 0 && $newCol < $cols && $board[$newRow][$newCol] === 'M') {
                        $minesCount++;
                    }
                }
            }
            $board[$i][$j] = $minesCount;
        }
    }
}

// Inicializar el juego
if (!isset($_SESSION['board'])) {
    $board = initializeBoard($rows, $cols);
    placeMines($board, $rows, $cols, $numMines);
    calculateNumbers($board, $rows, $cols);
    $_SESSION['board'] = $board;

    // Crear una máscara para celdas ocultas
    $_SESSION['mask'] = initializeBoard($rows, $cols);
}

// Obtener tablero y máscara desde sesión
$board = $_SESSION['board'];
$mask = $_SESSION['mask'];

// Procesar clic del usuario
if (isset($_POST['row']) && isset($_POST['col'])) {
    $row = (int)$_POST['row'];
    $col = (int)$_POST['col'];

    // Descubrir celda seleccionada
    if ($board[$row][$col] === 'M') {
        $mask[$row][$col] = 'X'; // Perdiste
        $_SESSION['game_over'] = true;
    } else {
        discoverCell($row, $col, $board, $mask);
    }

    $_SESSION['mask'] = $mask;
}

// Función para descubrir celdas
function discoverCell($row, $col, &$board, &$mask) {
    if ($row < 0 || $row >= count($board) || $col < 0 || $col >= count($board[0]) || $mask[$row][$col] === 1) {
        return;
    }

    $mask[$row][$col] = 1; // Descubrir la celda
    if ($board[$row][$col] === 0) { // Si es un espacio vacío, descubrir vecinos
        for ($x = -1; $x <= 1; $x++) {
            for ($y = -1; $y <= 1; $y++) {
                discoverCell($row + $x, $col + $y, $board, $mask);
            }
        }
    }
}

// Mostrar el tablero
function renderBoard($board, $mask, $rows, $cols, $gameOver) {
    echo "<form method='post'>";
    echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            if ($mask[$i][$j] === 1 || $gameOver) {
                // Mostrar celda descubierta
                $cell = $board[$i][$j];
                if ($cell === 'M') {
                    echo "<td style='width: 30px; height: 30px; background-color: red;'>💣</td>";
                } else {
                    echo "<td style='width: 30px; height: 30px;'>$cell</td>";
                }
            } else {
                // Celda oculta
                echo "<td style='width: 30px; height: 30px; background-color: lightgray;'>";
                echo "<button type='submit' name='row' value='$i'>";
                echo "<input type='hidden' name='col' value='$j'>";
                echo "&nbsp;&nbsp;&nbsp;";
                echo "</button>";
                echo "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
}

// Mostrar mensaje de fin de juego
if (isset($_SESSION['game_over']) && $_SESSION['game_over']) {
    echo "<h2>¡Has perdido! 🚩</h2>";
    session_destroy(); // Reiniciar el juego
    header('refresh:3');
} else {
    renderBoard($board, $mask, $rows, $cols, false);
}
?>
