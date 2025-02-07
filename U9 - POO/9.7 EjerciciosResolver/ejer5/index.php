<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'Animal.php';
    include_once 'Mamifero.php';
    include_once 'Ave.php';
    include_once 'Gato.php';
    include_once 'Perro.php';
    include_once 'Canario.php';
    include_once 'Pinguino.php';
    include_once 'Lagarto.php';


    $gato1 = new Gato("Garfield",2,"Macho");
    $perro1 = new Perro("Scooby doo",5,"Macho");
    $canario1 = new Canario("Piolin",3,"Hembra");
    $pinguino1 = new Pinguino("Pingu", 12,"Macho");
    $lagarto1 = new Lagarto("Juancho",22,"Macho");

    echo $gato1->comer() ."<br><br>";
    echo $perro1->comer()."<br>";
    echo $perro1->moverCola() ."<br><br>";
    echo $canario1->comer()."<br>";
    echo $canario1->volar()."<br><br>";
    echo $pinguino1->comer()."<br>";
    echo $pinguino1->nadar()."<br><br>";
    echo $lagarto1->comer()."<br>";
    echo $lagarto1->tomarSol()."<br><br>";
    ?>
</body>
</html>