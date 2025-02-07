<!-- Crea un formulario donde el usuario introduce una fecha a través de 3 cajas de texto, si no es 
correcta se debe indicar en un mensaje; si es correcta se debe mostrar en el formato elegido. 
Crea una lista desplegable con todas las posibilidades de formato que se te ocurran.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Elegir formato de horas</h2>
    <form action="" method="post">
        Hora: <input type="number" name="hora" id="" required><br>
        Minutos: <input type="number" name="minuto" id="" required><br>
        Segundos: <input type="number" name="segundo" id="" required><br>
        <select name="formato" id="" required>
            <option value="'H:i:s'">'H:i:s'</option>
            <option value="'h:i:s'">'h:i:s'</option>
        </select><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    function comprueba($hora,$minuto,$segundo){
        if (($hora>0 && $hora<=24) && ($minuto>0 && $minuto<=59) && ($segundo>0 && $segundo<=59)) {
            return true;
        }else {
            return false;
        }
    }

    if (!isset($_REQUEST['hora'])) {
        $horas = 0;
        $minutos = 0;
        $segundos = 0;
    }else {
        $horas = $_REQUEST['hora'];
        $minutos = $_REQUEST['minuto'];
        $segundos = $_REQUEST['segundo'];
        $formato = $_REQUEST['formato'];

        if (comprueba($horas,$minutos,$segundos)) {
            $cadena =  strtotime("$horas:$minutos:$segundos");
            $hora = date($formato,$cadena);
            echo "$hora";
        }else{
            echo "Datos incorrectos";
        }
        
        
    }
    ?>
</body>
</html>