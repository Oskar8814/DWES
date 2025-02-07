<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        $color = $_REQUEST['color'];
        $fuente = $_REQUEST['fuente'];
        $alineacion = $_REQUEST['alineacion'];
        $tamanio = $_REQUEST['tamaño'];
        $img = $_REQUEST['imagen'];
    ?>
    <style>
        body{
            background-color:<?=$color?>;
            font-family: <?=$fuente?>;
            text-align: <?=$alineacion?>;
            font-size:<?=$tamanio?>;
        };
    </style>
</head>
<body>
    <img src="<?= $img ?>" alt="">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Dolore dicta eos quo veniam eveniet sunt repudiandae porro consequatur placeat reiciendis iusto, 
    dignissimos rerum. Corporis fugit nam necessitatibus sequi dignissimos minima.</p>
</body>
</html>