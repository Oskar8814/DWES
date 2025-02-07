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
        $personas= [    
        ['nombre'=>'Anita','sexo'=>'m','orientacion'=>'bis'], 
        ['nombre'=>'Lolita','sexo'=>'m','orientacion'=>'bis'], 
        ['nombre'=>'Pepito','sexo'=>'h','orientacion'=>'bis'], 
        ['nombre'=>'Juanito','sexo'=>'h','orientacion'=>'bis'], 
        ['nombre'=>'Roberto','sexo'=>'h','orientacion'=>'het'], 
        ['nombre'=>'Antonio','sexo'=>'h','orientacion'=>'het'], 
        ['nombre'=>'Manuela','sexo'=>'m','orientacion'=>'het'], 
        ['nombre'=>'Isabel','sexo'=>'m','orientacion'=>'het'], 
        ['nombre'=>'Jenifer','sexo'=>'m','orientacion'=>'hom'], 
        ['nombre'=>'Susan','sexo'=>'m','orientacion'=>'hom'], 
        ['nombre'=>'Peter','sexo'=>'h','orientacion'=>'hom'], 
        ['nombre'=>'Mike','sexo'=>'h','orientacion'=>'hom']];

        if(!isset($_REQUEST['nombre'])){
            $nombre = "";
            $sexo = "";
            $orient = "";
            $persona = [];
        }else{
            $nombre = $_REQUEST['nombre'];
            $sexo = $_REQUEST['sexo'];
            $orient = $_REQUEST['orientacion'];
            $persona = ['nombre'=>$nombre, 'sexo' => $sexo, 'orientacion' => $orient];
            $personas = unserialize(base64_decode($_REQUEST['personas']));
            $personas[] = $persona;
            
        }
    ?>
    <h2>Introduce los datos de una Persona</h2>
    <form action="" method="post">
        <label for="nombre">Introduce el nombre</label>
        <input type="text" name="nombre" required><br>
        <label for="sexo">Introduce el sexo</label>
        <input type="text" name="sexo" id="" required><br>
        <label for="orientacion">Introduce la orientación</label>
        <input type="text" name="orientacion" id="" required><br>
        <input type="hidden" name="personas" value="<?= base64_encode(serialize($personas)) ?>l">
        <input type="submit" value="Añadir">
    </form>
    <br><br>
    <form action="ejer4_parejaAleatorio.php" method="post">
        <label for="pareja">Generador de parejas aleatorias</label>
        <input type="hidden" name="personas" value="<?= base64_encode(serialize($personas)) ?>">
        <input type="submit" value="Generar">
    </form>
</body>
</html>