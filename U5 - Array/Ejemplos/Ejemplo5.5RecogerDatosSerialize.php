<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
</head> 
<body> 
    <?php 
    if (isset($_POST['n'])) { 
        $contadorNumeros = $_POST['contadorNumeros']; 
        $numeroTexto = $_POST['numeroTexto'] . " ". $_POST['n']; 
    } else { 
        $contadorNumeros = 0; 
        $numeroTexto = ""; 
    } 
    // Muestra los números introducidos 
    if ($contadorNumeros == 6) { 
        $numeroTexto = substr($numeroTexto, 1); // quita el primer espacio 
        $numero = explode(" ", $numeroTexto); //Crea una array llamada $numero que ira metiendo los numeros del string $numeroTexto
        echo "Los números introducidos son: "; 
        foreach ($numero as $n) { 
            echo $n, " "; 
        } 
        echo "<br>";
        echo "Se han recogido todos los numeros en un array que se enviara a otra pagina <br>";
        $cadena = serialize($numero);
        ?>
        <a href='recibearrayUnserialize.php?array=<?=$cadena?>'>Enviar el array a otra pagina</a>
        <?php
    } else { 
    ?> 
    <form action="#" method="post"> 
        Introduzca un número: 
        <input type="number" name="n" autofocus> 
        <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>"> 
        <input type="hidden" name="numeroTexto" value="<?= $numeroTexto ?>"> 
        <input type="submit" value="OK"> 
        </form> 
    <?php 
    } 
    ?> 
</body> 
</html>