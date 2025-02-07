<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    //Cantidad de clientes por pagina guardado en una session para no perder el valor cuando se cambia de pagina (por defecto seran 5)
    if (!isset($_SESSION['clientesPorPagina'])) {
        $_SESSION['clientesPorPagina']=5;
    }


    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8","root","");
        // echo "Se ha establecido una conexión con el servidor de bases de datos.";
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");
    $total_clientes = $consulta->rowCount();
    
    //Modificar mediante formulario la cantidad de clientes por pagina, actualizando la ss
    if (isset($_REQUEST['clientesPagina'])) {
        $_SESSION['clientesPorPagina'] = $_REQUEST['clientesPagina'];
    }

    $cantidad_paginas=ceil($total_clientes/$_SESSION['clientesPorPagina']);

    //Obtner la pagina a mostrar mediante formulario
    if (isset($_REQUEST['pagina'])) {
        $pagina_actual = $_REQUEST['pagina'];
    }else {
        $pagina_actual = 1;
    }

    // Calcular el límite de registros para la consulta 
    $inicio = ($pagina_actual - 1) * $_SESSION['clientesPorPagina'];

    //Consulta con los limites adecuados.
    $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente LIMIT $inicio, $_SESSION[clientesPorPagina]");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        th,td,tr,table{
            border: 1px solid black;
            /* border-collapse: collapse; */
        }
        /* input[type="submit"] {
            padding: 10px 15px;
            background-color: darkred; 
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: red; 
        } */
        .paginacion {
            text-align: center; 
        }
        
    </style>
</head>

<body>
    <h1>Mantenimiento de clientes</h1>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
        </tr>
        <?php
        while ($cliente = $consulta->fetchObject()) {
        ?>
            <tr>
                <td><?= $cliente->dni ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->direccion ?></td>
                <td><?= $cliente->telefono ?></td>
                <td>
                    <form action="confirmacion.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminar" value="<?= $cliente->dni ?>">
                    </form>
                </td>
                <td>
                    <form action="modificarCliente.php" method="post">
                        <input type="submit" value="Modificar">
                        <input type="hidden" name="modificar" value="<?= $cliente->dni ?>">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <!-- <table class="paginacion">
    <tr>
        <?php
        // for ($i = 1; $i <= $cantidad_paginas; $i++) {
        //     echo "<td><a href='?pagina=" . $i . "'>" . $i . "</a></td>";
        // }
        ?>
    </tr>
    </table> -->
    <form action="" method="post">
        <label for="">Cantidad de Clientes por página</label>
        <input type="number" name="clientesPagina" id="">
        <input type="submit" value="Enviar">
    </form>
    <table class="paginacion">
    <tr>
        <?php
        for ($i = 1; $i <= $cantidad_paginas; $i++) {
        ?>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="pagina" value="<?= $i ?>">
                    <input type="submit" value="<?= $i ?>">
                </form>
            </td>
        <?php
        }
        ?>
    </tr>
    </table>

    <h1>Añadir un nuevo Cliente</h1>
    <form action="altaCliente.php" method="post">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="" required><br><br>
        <label for="dni">Nombre:</label>
        <input type="text" name="nombre" id="" required><br><br>
        <label for="dni">Dirección:</label>
        <input type="text" name="direccion" id="" required><br><br>
        <label for="dni">Teléfono:</label>
        <input type="text" name="telefono" id="" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>