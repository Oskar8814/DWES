<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $piso = isset($_REQUEST["piso"]) ? $_REQUEST['piso'] : null;
        $bloque = isset($_REQUEST["bloque"]) ? $_REQUEST['bloque'] : null;
    ?>
    <h1>“Usted ha llamado al piso <?= $piso ?> del bloque <?= $bloque ?> ”</h1>
</body>
</html>