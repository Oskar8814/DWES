<!-- Vamos a realizar una página para generar parejas aleatorias según su sexo y orientación sexual. 
Para  ello  en  una  primera  página  pediremos  de  manera  reiterada  el  nombre,  sexo  (h  o  m)  y 
orientación (heterosexual, homosexual o  bisexual)  de  personas,  que  se  irán  almacenando en 
un  array.  Se  dispondrá  además,  de  un  botón  para  pasar  a  la  segunda  página  que  permite 
generar  las parejas aleatorias  con las personas introducidas.  Esta segunda página debe 
contener tres botones para generar una pareja aleatoria de los siguientes tipos: 
-Heterosexual: Obtendrá aleatoriamente una primera persona de cualquier sexo y orientación 
heterosexual,  que  unirá  con  una  segunda  persona  de  distinto  sexo  que  sea  heterosexual  o 
bisexual. 
-Homosexual: Obtendrá aleatoriamente una primera persona de cualquier sexo y orientación 
homosexual, que unirá con otra persona del mismo sexo y orientación. 
-Bisexual:  Obtendrá  aleatoriamente  una  primera  persona  de  cualquier  sexto  y  orientación 
bisexual, que unirá con otra persona que sea compatible, el perfil incompatible sería 
homosexual de distinto sexo o heterosexual del mismo sexo.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php    
    
    if (!isset($_REQUEST['personas'])){ //Si no recibe el array persona automaticamente regresa a la pagina inicial.
        header('location:ejer4.php');
    }

    if (isset($_REQUEST['personas'])) {
        $personas = unserialize(base64_decode($_REQUEST['personas']));
    }

    ?>
    <h2>Parejas Aleatorias</h2>
    <form action="" method="post">
        
        <input type="submit" name="orientacion" value="Heterosexual">
        <input type="submit" name="orientacion" value="Homosexual">
        <input type="submit" name="orientacion" value="Bisexual">
        <input type="hidden" name="personas" value="<?= base64_encode(serialize($personas)) ?>">
    </form>
    <?php
        if(isset($_REQUEST['orientacion'])){


            $orientacion = $_REQUEST['orientacion'];
            //$personas = unserialize(base64_decode($_REQUEST['personas']));
            //var_dump($orientacion);
            //var_dump($personas);
            if($orientacion == "Heterosexual"){
                do {
                    $persona = $personas[array_rand($personas,1)]; //selecciona al azar una persona del array .
                } while ($persona["orientacion"] != "het");
                
                do {
                    $persona2 = $personas[array_rand($personas,1)];
                } while ($persona["sexo"] === $persona2["sexo"] || $persona2["orientacion"] == "hom");

                ?>
                <h3><?= $persona["nombre"]?> emparejado con <?= $persona2["nombre"] ?></h3>
                <?php

            }elseif($orientacion =="Homosexual"){
                do {
                    $persona = $personas[array_rand($personas,1)]; //selecciona al azar una persona del array
                } while ($persona["orientacion"]!= "hom");

                do {
                    $persona2 = $personas[array_rand($personas,1)];
                } while ($persona2["orientacion"] != "hom" || $persona2["sexo"]!= $persona["sexo"] || $persona2["nombre"]==$persona["nombre"]);

                ?>
                <h3><?= $persona["nombre"]?> emparejado con <?= $persona2["nombre"] ?></h3>
                <?php
                
            }elseif ($orientacion == "Bisexual"){
                do {
                    $persona = $personas[array_rand($personas,1)]; //selecciona al azar una persona del array
                } while ($persona["orientacion"]!= "bis");
                
                do {
                    $persona2 = $personas[array_rand($personas,1)];
                }  while ((  ($persona2['sexo'] != $persona['sexo'] && $persona2['orientacion'] == 'hom' || $persona2['sexo'] == $persona['sexo'] && $persona2['orientacion'] == 'het')));
                ?>
                <h3><?= $persona["nombre"]?> emparejado con <?= $persona2["nombre"] ?></h3>
                <?php
            }

        }else{
            $orientacion = null;
        }
    ?>
</body>
</html>