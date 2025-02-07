<!-- Realiza un programa que escoja al azar 5 palabras en inglés de un mini -diccionario. El programa pedirá que el 
usuario teclee la traducción al español de cada una de las palabras y comprobará si son correctas. Al final, el 
programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas. La  aplicación  debe  tener una 
opción para introducir los pares de palabras (inglés - español) que se deben guardar en cookies; de esta forma, 
si  de  vez en  cuando  se  dan de  alta nuevas palabras, la  aplicación puede llegar a  contar con  un número 
considerable de entradas en el mini-diccionario. -->

<?php
session_start();

// Inicializar diccionario si no existe en la cookie
if (!isset($_COOKIE['diccionario'])) {
    $diccionarioArray = [
        'hello' => 'hola',
        'world' => 'mundo',
        'house' => 'casa',
        'dog' => 'perro',
        'cat' => 'gato',
        'book' => 'libro',
        'love' => 'amor',
        'food' => 'comida',
        'school' => 'escuela',
        'family' => 'familia',
        'computer' => 'computadora',
        'car' => 'coche',
        'tree' => 'árbol',
        'water' => 'agua',
        'friend' => 'amigo',
        'music' => 'música',
        'sun' => 'sol',
        'moon' => 'luna',
        'star' => 'estrella',
        'flower' => 'flor',
        'beach' => 'playa',
        'mountain' => 'montaña',
        'city' => 'ciudad',
        'country' => 'país',
        'river' => 'río',
        'ocean' => 'océano',
        'road' => 'camino',
        'sky' => 'cielo',
        'phone' => 'teléfono',
        'movie' => 'película',
        'song' => 'canción'
    ];
    $diccionarioCadena = base64_encode(serialize($diccionarioArray));
    setcookie("diccionario", $diccionarioCadena, time() + 3600);
} else {
    $diccionarioArray = unserialize(base64_decode($_COOKIE['diccionario']));
}
// eliminar cookies
if (isset($_REQUEST['borraCookies'])) {
    setcookie("diccionario", "", time() - 3600);
    unset($diccionarioArray);
    header('refresh:0');
}
//Resetear datos del intento 
if (isset($_REQUEST['otroIntento'])) {
    unset($_SESSION['palabrasIngles']);
}
// Añadir palabra al diccionario si se ha enviado el formulario
if (isset($_REQUEST['espanol']) && isset($_REQUEST['ingles'])) {
    $esp = $_REQUEST['espanol'];
    $ing = $_REQUEST['ingles'];

    $diccionarioArray[$ing] = $esp; // Añadir nueva palabra al diccionario
    $diccionarioCadena = base64_encode(serialize($diccionarioArray));
    setcookie("diccionario", $diccionarioCadena, time() + 3600);
}

// Escoge de forma aleatoria 5 palabras en inglés para traducirlas si aún no están en la sesión
if (!isset($_SESSION['palabrasIngles'])) {
    $_SESSION['palabrasIngles'] = array_rand($diccionarioArray, 5);
}
$palabrasIngles = $_SESSION['palabrasIngles'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php var_dump($diccionarioArray) ?> <!-- Mostrar el diccionario para comprobar que se añaden bien nuevas palabras, comentarlo para que no aparezca -->

    <!-- Formulario para añadir palabras al diccionario -->
    <h1>Añadir palabras al diccionario</h1>
    <form action="#" method="post">
        Español: <input type="text" name="espanol" required>
        Inglés: <input type="text" name="ingles" required>
        <input type="submit" value="Añadir al diccionario">
    </form>

    <?php
    // Comprobar aciertos si se han enviado respuestas y cantidad de aciertos
    if (isset($_REQUEST['respuestaEsp'])) {
        $respuestaEsp = $_REQUEST['respuestaEsp'];
        $palabrasIngles = $_SESSION['palabrasIngles'];
        $aux = 0;

        echo "<h2>Cantidad de aciertos</h2>";
        foreach ($palabrasIngles as $key => $palabra) {
            if (strtolower($diccionarioArray[$palabra]) === strtolower($respuestaEsp[$key])) {
                $aux++;
                echo "<p>La traducción correcta para '$palabra' es: {$diccionarioArray[$palabra]}</p>";
            }else {
                echo "<p>La traducción correcta para '$palabra' es: {$diccionarioArray[$palabra]}</p>";
            }
        }
        echo "<p style= 'font-weight: 600;'>Has tenido " . $aux . " aciertos</p>";

        ?>

        <!-- Volver a intentarlo con diferentes palabras en inglés -->
        <br>
        <form action="" method="post">
            <input type="hidden" name="otroIntento" value="si">
            <input type="submit" value="Nueva traducción">
        </form>
        <br>
        <!-- Volver a intentarlo con las mismas palabras en inglés -->
        <form action="" method="post">
            <input type="submit" value="Vuelve a intentarlo">
        </form>

        <?php
    } else {
    ?>
        <!-- Formulario para introducir las 5 intentos de traducciones -->
        <h1>Traducir</h1>
        <form action="" method="post">
            <?php
            for ($i = 0; $i < 5; $i++) {
            ?>
                Escriba la traduccion a la palabra <?= $palabrasIngles[$i] ?> <input type="text" name="respuestaEsp[]" id=""><br>
            <?php
            }
            ?>
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>

    <!-- Borrado de cookies -->
    <h1>Eliminar Cookies</h1>
    <form action="#" method="post">
        <input type="hidden" name="borraCookies" value="si">
        <input type="submit" value="Borrar todas las cookies">
    </form>
    <br>
    <form action="#" method="post">
        <input type="hidden" name="otroIntento" value="si">
        <input type="submit" value="Realizar otro intento">
    </form>
</body>
</html>