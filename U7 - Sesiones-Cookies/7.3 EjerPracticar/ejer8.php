<!-- Realiza un programa que escoja al azar 5 palabras en inglés de un mini -diccionario. El programa pedirá que el 
usuario teclee la traducción al español de cada una de las palabras y comprobará si son correctas. Al final, el 
programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas. La  aplicación  debe  tener una 
opción para introducir los pares de palabras (inglés - español) que se deben guardar en cookies; de esta forma, 
si  de  vez en  cuando  se  dan de  alta nuevas palabras, la  aplicación puede llegar a  contar con  un número 
considerable de entradas en el mini-diccionario. -->
<?php
session_start();
// Borrado de todas las cookies
if (isset($_REQUEST['borraCookies'])) {    
    setcookie("diccionario", "", -3600);
    unset($diccionarioArray);
}
//Borrar datos del intento 
if (isset($_REQUEST['borrarIntento'])) {    
    unset($_SESSION['palabrasIngles']);
}

// Inicializa la cookie del diccionario si no existe y sino crea la variable con el dicc
if (!isset($_COOKIE['diccionario'])) {
    
    $diccionarioArray= [
        'hello' => 'hola',
        'world' => 'mundo',
        'house' => 'casa',
        'dog' => 'perro',
        'cat' => 'gato',
        'book' => 'libro',
        'love' => 'amor',
        'food' => 'comida',
        'school' => 'escuela',
        'family' => 'familia'
    ];
    $diccionarioCadena = base64_encode(serialize($diccionarioArray));
    setcookie("diccionario",$diccionarioCadena,time()+3600); 
}else{
    $diccionarioArray = unserialize(base64_decode($_COOKIE['diccionario']));
}

//Añade palabras recogidas por formulario al diccionario(cookie)
if (isset($_REQUEST['espanol']) && $_REQUEST['ingles']) {
    $esp = $_REQUEST['espanol'];
    $ing = $_REQUEST['ingles'];
    
    $diccionarioArray [$ing] = $esp ;
    $diccionarioCadena = base64_encode(serialize($diccionarioArray));
    setcookie("diccionario",$diccionarioCadena,time()+3600);
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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php var_dump($diccionarioArray);?>

    <!-- Formulario para añadir palabras al diccionario -->
    <h1>Añadir palabras al diccionario</h1>
    <form action="#" method="post">
        Español: <input type="text" name="espanol" id="">
        Ingles: <input type="text" name="ingles" id="">
        <input type="submit" value="Añadir al diccionario">
    </form>

    <!-- Formulario para introducir las posibles traducciones -->
    <h1>Traducir</h1>
    <form action="" method="post">
        <?php
        for ($i=0; $i < 5 ; $i++) { 
            ?>
                Escriba la traduccion a la palabra <?= $palabrasIngles[$i] ?> <input type="text" name="respuestaEsp[]" id=""><br>
            <?php
        }
        ?>
        <input type="submit" value="Enviar">
    </form>

    <!-- Borrado de cookies -->
    <h1>Eliminar Cookies</h1>
    <form action="#" method="post">
        <input type="hidden" name="borraCookies" value="si">
        <input type="submit" value="Borrar cookies">
    </form>
    <br>
    <form action="#" method="post">
        <input type="hidden" name="borrarIntento" value="si">
        <input type="submit" value="Otro intento">
    </form>

    <?php
    // Comprobar aciertos
    if (isset($_REQUEST['respuestaEsp'])) {
        $respuestaEsp = $_REQUEST['respuestaEsp'];
        $palabrasIngles = $_SESSION['palabrasIngles'];
        $aux = 0;

        foreach ($palabrasIngles as $index => $palabraIngles) {
            if (strtolower($diccionarioArray[$palabraIngles]) === strtolower($respuestaEsp[$index])) {
                $aux++;
                echo "<p>La traducción correcta para '$palabraIngles' es: {$diccionarioArray[$palabraIngles]}</p>";
            } else {
                echo "<p>La traducción correcta para '$palabraIngles' es: {$diccionarioArray[$palabraIngles]}</p>";
            }
        }
        echo "Has tenido $aux aciertos de " . count($palabrasIngles) . ".";
    }

    ?>
</body>
</html>