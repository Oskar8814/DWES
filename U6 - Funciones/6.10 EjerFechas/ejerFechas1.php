<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Elegir formato de Dias</h2>
    <form action="" method="post">
        Dias: <input type="number" name="dia" id="" required><br>
        Mes: <input type="number" name="mes" id="" required><br>
        Año: <input type="number" name="año" id="" required><br>
        <select name="formato" id="" required>
            <option value="d-m-y">DD-MM-YY</option>
            <option value="d-m-Y">DD-MM-YYYY</option>
            <option value="m-d-Y">MM-DD-YYYY</option>
            <option value="Y-m-d">YYYY-MM-DD</option>
            <option value="d-m-Y H:i:00">"DD-MM-YYYY H:i:00"</option>
        </select><br>
        <input type="submit" value="Enviar">
    </form>
    <?php


    if (!isset($_REQUEST['dia'])) {
        $dias = 0;
        $mes = 0;
        $año = 0;
    }else {
        $dias = $_REQUEST['dia'];
        $mes = $_REQUEST['mes'];
        $año = $_REQUEST['año'];
        $formato = $_REQUEST['formato'];
        

        if (checkdate($mes,$dias,$año)) {
            
            $fechaFormat=date($formato,strtotime("$mes-$dias-$año"));
            echo "$fechaFormat";
        }else {
            echo "Fecha invalida.";
        }
        
        
    }
    ?>
</body>
</html>