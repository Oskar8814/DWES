<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style6b.css">
</head>
<body>
    <?php
        if (!isset($_REQUEST['personas'])) {
            header('location:ejer6.php');
        }
        if (isset($_REQUEST['personas'])) {
            $personas = unserialize(base64_decode($_REQUEST['personas']));
            $textoPersonas = base64_encode(serialize($personas)); //Enviar en el formulario en el input hidden para conservar el array
        }
        
    ?>
    <h2>Generar parejas aleatorias</h2>
    <form action="" method="post">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Orientación</th>
                <th>Elegir</th>
            </tr>
            <?php
            foreach ($personas as $key => $persona) {
                ?>
                <tr>
                    <td><?= $persona["nombre"] ?></td>
                    <td><?php echo ($persona["sexo"] == "h")?"Hombre":"Mujer"?></td>
                    <td>
                        <?php 
                            if ($persona["orientacion"]=="bis") {
                                echo"Bisexual";
                            }elseif($persona["orientacion"]=="hom"){
                                echo "Homosexual";
                            }elseif($persona["orientacion"]=="het"){
                                echo "Heterosexual";
                            }
                        ?>
                    </td>
                    <td><input type="radio" name="persona" value="<?= $key?>"></td>
                    <input type="hidden" name="personas" value="<?= $textoPersonas ?>">
                </tr>
                <?php
            }
            ?>
        </table>
        
        <input type="submit" value="Generar">
    </form>

    <!-- Continuar // Tabla con las personas emparejadas a la persona seleccionada en el form anterior. -->
    <?php
        if (isset($_REQUEST['persona'])){
            $personas = unserialize(base64_decode($_REQUEST['personas']));
            $personaElegida = $personas[$_REQUEST['persona']];
            //var_dump($persona);
            if ($personaElegida["orientacion"]=="het") {
                ?>
                <br><br>
                <h2>Posibles parejas para <?= $personaElegida["nombre"] ?></h2>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Orientación</th>
                    </tr>
                    <tr >
                        <th class="elegida"><?= $personaElegida["nombre"] ?></th>
                        <th class="elegida"><?= ($personaElegida["sexo"] == "h")?"Hombre":"Mujer"?></th>
                        <th class="elegida">
                            <?php 
                                if ($personaElegida["orientacion"]=="bis") {
                                    echo"Bisexual";
                                }elseif($personaElegida["orientacion"]=="hom"){
                                    echo "Homosexual";
                                }elseif($personaElegida["orientacion"]=="het"){
                                    echo "Heterosexual";
                                }                                
                            ?>
                        </th>
                    </tr>
                    <?php
                    foreach ($personas as $key => $persona) {
                        if (($persona["orientacion"] == "het" || $persona["orientacion"] == "bis") && $persona["sexo"]!=$personaElegida["sexo"]) {
                            ?>
                            <tr>
                                <td><?= $persona["nombre"] ?></td>
                                <td><?php echo ($persona["sexo"] == "h")?"Hombre":"Mujer"?></td>
                                <td>
                                <?php 
                                    if ($persona["orientacion"]=="bis") {
                                        echo"Bisexual";
                                    }elseif($persona["orientacion"]=="hom"){
                                        echo "Homosexual";
                                    }elseif($persona["orientacion"]=="het"){
                                        echo "Heterosexual";
                                    }
                                ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                </table>
                <?php
            }elseif($personaElegida["orientacion"]=="hom"){
                ?>
                <br><br>
                <h2>Posibles parejas para <?= $personaElegida["nombre"] ?></h2>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Orientación</th>
                    </tr>
                    <tr >
                        <th class="elegida"><?= $personaElegida["nombre"] ?></th>
                        <th class="elegida"><?= ($personaElegida["sexo"] == "h")?"Hombre":"Mujer"?></th>
                        <th class="elegida">
                            <?php 
                                if ($personaElegida["orientacion"]=="bis") {
                                    echo"Bisexual";
                                }elseif($personaElegida["orientacion"]=="hom"){
                                    echo "Homosexual";
                                }elseif($personaElegida["orientacion"]=="het"){
                                    echo "Heterosexual";
                                }                                
                            ?>
                        </th>
                    </tr>
                    <?php
                    foreach ($personas as $key => $persona) {
                        if (($persona["orientacion"] == "hom" ) && $persona["sexo"]==$personaElegida["sexo"] && $persona["nombre"]!=$personaElegida["nombre"]) {
                            ?>
                            <tr>
                                <td><?= $persona["nombre"] ?></td>
                                <td><?php echo ($persona["sexo"] == "h")?"Hombre":"Mujer"?></td>
                                <td>
                                <?php 
                                    if ($persona["orientacion"]=="bis") {
                                        echo"Bisexual";
                                    }elseif($persona["orientacion"]=="hom"){
                                        echo "Homosexual";
                                    }elseif($persona["orientacion"]=="het"){
                                        echo "Heterosexual";
                                    }
                                ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                </table>
                <?php
            }elseif($personaElegida["orientacion"]=="bis"){
                ?>
                <br><br>
                <h2>Posibles parejas para <?= $personaElegida["nombre"] ?></h2>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Orientación</th>
                    </tr>
                    <tr >
                        <th class="elegida"><?= $personaElegida["nombre"] ?></th>
                        <th class="elegida"><?= ($personaElegida["sexo"] == "h")?"Hombre":"Mujer"?></th>
                        <th class="elegida">
                            <?php 
                                if ($personaElegida["orientacion"]=="bis") {
                                    echo"Bisexual";
                                }elseif($personaElegida["orientacion"]=="hom"){
                                    echo "Homosexual";
                                }elseif($personaElegida["orientacion"]=="het"){
                                    echo "Heterosexual";
                                }                                
                            ?>
                        </th>
                    </tr>
                    <?php
                    foreach ($personas as $key => $persona) {
                        if (($persona["orientacion"]!="hom" && $persona["sexo"]!=$personaElegida["sexo"]) || ($persona["orientacion"]!="het" && $persona["sexo"]==$personaElegida["sexo"]) && $persona["nombre"]!=$personaElegida["nombre"]) {
                            ?>
                            <tr>
                                <td><?= $persona["nombre"] ?></td>
                                <td><?php echo ($persona["sexo"] == "h")?"Hombre":"Mujer"?></td>
                                <td>
                                <?php 
                                    if ($persona["orientacion"]=="bis") {
                                        echo"Bisexual";
                                    }elseif($persona["orientacion"]=="hom"){
                                        echo "Homosexual";
                                    }elseif($persona["orientacion"]=="het"){
                                        echo "Heterosexual";
                                    }
                                ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                </table>
                <?php
            }
        }
    ?>
</body>
</html>