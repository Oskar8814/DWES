<?php
include_once 'BombillaB.php';
include_once 'funciones.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['bombillas'])) {
    $_SESSION['bombillas'] = cargar(); //Cargamos desde el fichero txt las bombillas que tenemos al array de la ss
    
    // $_SESSION['bombillas'][] = serialize(new Bombilla(50, "Cocina"));
    // $_SESSION['bombillas'][] = serialize(new Bombilla(45, "Baño"));
    // $_SESSION['bombillas'][] = serialize(new Bombilla(45, "Salón"));

    // guardar();
}

if (isset($_REQUEST['ubicacion']) && isset($_REQUEST['potencia'])) {
    $ubicacion = $_REQUEST['ubicacion'];
    $potencia = intval($_REQUEST['potencia']);

    $nuevaBombilla = new Bombilla($potencia, $ubicacion);

    $_SESSION['bombillas'][] = serialize($nuevaBombilla);

    guardar();
}

//Enciende una bombilla con el boton
if (isset($_REQUEST['encender']) ) {
    $indice = intval($_REQUEST['indice']);
    $bombilla = unserialize($_SESSION['bombillas'][$indice]);
    $bombilla->encender();
    $_SESSION['bombillas'][$indice] = serialize($bombilla);
}

//Apaga una bombilla con el boton
if (isset($_REQUEST['apagar'])) {
    $indice = intval($_REQUEST['indice']);
    $bombilla = unserialize($_SESSION['bombillas'][$indice]);
    $bombilla->apagar();
    $_SESSION['bombillas'][$indice] = serialize($bombilla);
}

//Encender o apagar una bombilla con el enlace
if (isset($_REQUEST['accion']) && isset($_REQUEST['indice'])) {
    $indice = (int) $_REQUEST['indice'];
    $accion = $_REQUEST['accion'];
    // var_dump($_SESSION['bombillas'], $indice);

    if (isset($_SESSION['bombillas'][$indice])) {   //Si tenemos la bombilla en el ss
        $bombilla = unserialize($_SESSION['bombillas'][$indice]); //Deserializamos la bomb y la etnemos como objeto

        // print_r($bombilla);
        if ($accion === 'encender') { //Si hemos recibido del enlace la opcion encender encendemos el objeto bomb con el metodo de la clase
            $bombilla->encender();
        }elseif ($accion ==='apagar') { //Si hemos recibido del enlace la opcion apagar, apagaremos el objeto bomb con el metodo de la clase
            $bombilla->apagar();
        }
        $_SESSION['bombillas'][$indice] = serialize($bombilla); //Actualizamos la bombilla apagada o encendida segun corresponda y guardamos serializada en la ss

        
    }
    header('Location:index2.php');
    
}

//Eliminar una bombilla y reajustar el consumo general
if (isset($_REQUEST['eliminar'])&& isset($_REQUEST['indice'])) {
    $indice = $_REQUEST['indice'];

    if (isset($_SESSION['bombillas'][$indice])) {
        
        //Antes de eliminarla recalcular/reajustar la potencia Global.
        $bombilla = unserialize($_SESSION['bombillas'][$indice]);
        if ($bombilla->getEstado() && Bombilla::getinterruptorGen()) {
            $_SESSION['potenciaGlobal'] -= $bombilla->getPotencia();
        }

        unset($_SESSION['bombillas'][$indice]); //Elimina la bombilla (no es necesario unserializarla para eliminarla)

    }
}

//Se apagan todas las bombillas
if (isset($_REQUEST['apagaGeneral'])) {
    $_SESSION['interruptorGen'] = false;
    $_SESSION['potenciaGlobal'] = 0; //Resetea el consumo global para evitar negativos
}


if (isset($_REQUEST['enciendeGeneral'])) {
    
    //Volvemos a poner la potencia general en el valor anterior al apagon 
    if (!$_SESSION['interruptorGen'] == true) {
        foreach ($_SESSION['bombillas'] as $ind => $bombi) {
            $bombilla = unserialize($bombi);
            if ($bombilla->getEstado()) {
                $_SESSION['potenciaGlobal'] += $bombilla->getPotencia();
            }
        }
    }
    //Activamos de nuevo las bombillas
    $_SESSION['interruptorGen'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        form {
            display: inline;
        }
        .img{
            display: block;
            margin: 10px 40px ;
        }

    </style>
</head>

<body>
    <h2>Generar Bombillas</h2>
    <form action="" method="post">
        <label for="">Ubicación:</label>
        <input type="text" name="ubicacion" id="">
        <label for="">Potencia:</label>
        <input type="number" name="potencia" id="">
        <input type="submit" value="Añadir Bombilla">
    </form>

<h2>Conjunto de Bombillas</h2>
<div class="cards-container">
    <?php
    foreach ($_SESSION['bombillas'] as $key => $bombilla) {
        $bombillaObj = unserialize($bombilla);
        $estado = $bombillaObj->estado();
        $imagen = $estado ? "img/encendida.png" : "img/apagada.png";
        $acc = $estado ? "apagar" : "encender";
    ?>
        <div class="card">
            <h3><?= $bombillaObj->getUbicacion() ?></h3>
            <p>Potencia: <?= $bombillaObj->getPotencia() ?>W</p>
            <a href="?accion=<?= $acc ?>&indice=<?= $key ?>">
                <img src="<?= $imagen ?>" alt="Estado de la bombilla">
            </a>
            <form action="" method="post">
                <input type="hidden" name="encender" value="1">
                <input type="hidden" name="indice" value="<?= $key ?>">
                <button type="submit">Encender</button>
            </form>
            <form action="" method="post">
                <input type="hidden" name="apagar" value="1">
                <input type="hidden" name="indice" value="<?= $key ?>">
                <button type="submit">Apagar</button>
            </form>
            <form action="administrar.php" method="post">
                <input type="hidden" name="administrar" value="1">
                <button type="submit">Administrar</button>
            </form>
        </div>
    <?php
    }
    ?>
</div>


    <h2>Consumo Global</h2>
    <?php
    echo "El consumo es " . Bombilla::getPotenciaGlobal(). "W";
    ?>

    <h2>Interruptor General</h2>
    <form action="" method="post">
        <input type="submit" value="Apagar General" name="apagaGeneral">
        <input type="submit" value="Encender General" name="enciendeGeneral">
    </form>
    
    <img class="img" src="<?= Bombilla::getinterruptorGen()? "img/on.png" : "img/off.png" ?>" alt="">
</body>

</html>