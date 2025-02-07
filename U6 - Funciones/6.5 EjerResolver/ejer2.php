<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 25%;
        } */
        td {
            border: 1px solid grey;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        include 'controlAcceso.php';
        echo "Administrador";
        imprimeTarjeta(dameTarjeta("administrador"));
        echo "Usuario";
        imprimeTarjeta(dameTarjeta("usuario"));

        // if (!isset($_REQUEST['valor'])) {
            
        // }else {
            
        // }
        $columnas = ['A', 'B', 'C', 'D', 'E']; 
        $fila = rand(1,5);
        $columna = rand(0,4)
        ?>
        <br><br>
        <form action="ejer2Comprueba.php" method="post">
            Perfil: <select name="perfil" id="" required>
                    <option value="administrador">Administrador</option>
                    <option value="usuario">Usuario</option>
            </select>
            <h2>Introduce la siguiente coordenada</h2>
            <h3>Coordenada Fila: <?= $fila  ?> Columna <?= $columnas[$columna] ?>: <input type="text" name="valor" ></h3>
            <input type="hidden" name="fila" value="<?= $fila ?>">
            <input type="hidden" name="columna" value="<?= $columna ?>"><br>
            <input type="submit" value="Comprobar">
        </form>
</body>
</html>