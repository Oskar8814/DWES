<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style6.css">
</head>
<body>
    <?php
        if (!isset($_REQUEST['personas'])){
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
        }else{
            if (isset($_REQUEST['persona'])) {
                $persona = $_REQUEST['persona'];
                $personas = unserialize(base64_decode($_REQUEST['personas']));
                $personas[] = $persona;
                //var_dump($personas);
            }else{
                $persona = [];
            }
        }
        ?>
        <form action="" method="post">
            <label class="label1" for="nombre">Introduce el nombre</label>
            <input type="text" name="persona[nombre]" required>
            <hr>
            <div class="checkbox-group">
                <label class="label1" for="sexo">Introduce el sexo:</label>
                <div>
                    <label><input type="checkbox" name="persona[sexo]" value="h">Hombre</label>
                    <label><input type="checkbox" name="persona[sexo]" value="m">Mujer</label>
                </div>
            </div>
            <hr>
            <div class="checkbox-group">
                <label class="label1" for="orientacion">Introduce la orientación:</label>
                    <div div class="checkbox-container">
                        <label><input type="checkbox" name="persona[orientacion]" value="bis">Bisexual</label>
                        <label><input type="checkbox" name="persona[orientacion]" value="hom">Homosexual</label>
                        <label><input type="checkbox" name="persona[orientacion]" value="het">Heterosexual</label>
                    </div>
            </div>
            <input type="hidden" name="personas" value="<?= base64_encode(serialize($personas)) ?>">
            <div class="button-container">
                <input type="submit" value="Añadir">
            </div>
        </form>
            <br><br>
        <form action="ejer6_parejaAleatorio.php" method="post">
            <label class="label1" for="pareja">Generador de parejas</label>
            <input type="hidden" name="personas" value="<?= base64_encode(serialize($personas)) ?>">
            <div class="button-container">
                <input type="submit" value="Generar">
            </div>
        </form>
</body>
</html>