<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-spacing:10px;
        }
        td{
            font-weight: bold;
            font-size: 21px;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

</head>
<body>
    <?php
        $serie = isset($_REQUEST['serie']) ? $_REQUEST['serie'] : null;

        $loteria1 = rand(1,50);
        $loteria2 = rand(1,50);
        $loteria3 = rand(1,50);
        $loteria4 = rand(1,50);
        $loteria5 = rand(1,50);
        $loteria6 = rand(1,50);
    
        $loteriaSerie = 22;
        $aciertos = 0;
        $cuenta = 0;
        $cantidadSeleccionados=0;

        //Obtener los numeros seleccionados y controlar que no sean mas de 6.
        if (isset($_REQUEST['numero1'])) {$numero1 = $_REQUEST['numero1']; $cantidadSeleccionados++; } else{$numero1=null;}
        if (isset($_REQUEST['numero2'])) {$numero2 = $_REQUEST['numero2']; $cantidadSeleccionados++; } else{$numero2=null;}
        if (isset($_REQUEST['numero3'])) {$numero3 = $_REQUEST['numero3']; $cantidadSeleccionados++; } else{$numero3=null;}
        if (isset($_REQUEST['numero4'])) {$numero4 = $_REQUEST['numero4']; $cantidadSeleccionados++; } else{$numero4=null;}
        if (isset($_REQUEST['numero5'])) {$numero5 = $_REQUEST['numero5']; $cantidadSeleccionados++; } else{$numero5=null;}
        if (isset($_REQUEST['numero6'])) {$numero6 = $_REQUEST['numero6']; $cantidadSeleccionados++; } else{$numero6=null;}
        if (isset($_REQUEST['numero7'])) {$numero7 = $_REQUEST['numero7']; $cantidadSeleccionados++; } else{$numero7=null;}
        if (isset($_REQUEST['numero8'])) {$numero8 = $_REQUEST['numero8']; $cantidadSeleccionados++; } else{$numero8=null;}
        if (isset($_REQUEST['numero9'])) {$numero9 = $_REQUEST['numero9']; $cantidadSeleccionados++; } else{$numero9=null;}
        if (isset($_REQUEST['numero10'])) {$numero10 = $_REQUEST['numero10']; $cantidadSeleccionados++; } else{$numero10=null;}
        if (isset($_REQUEST['numero11'])) {$numero11 = $_REQUEST['numero11']; $cantidadSeleccionados++; } else{$numero11=null;}
        if (isset($_REQUEST['numero12'])) {$numero12 = $_REQUEST['numero12']; $cantidadSeleccionados++; } else{$numero12=null;}
        if (isset($_REQUEST['numero13'])) {$numero13 = $_REQUEST['numero13']; $cantidadSeleccionados++; } else{$numero13=null;}
        if (isset($_REQUEST['numero14'])) {$numero14 = $_REQUEST['numero14']; $cantidadSeleccionados++; } else{$numero14=null;}
        if (isset($_REQUEST['numero15'])) {$numero15 = $_REQUEST['numero15']; $cantidadSeleccionados++; } else{$numero15=null;}
        if (isset($_REQUEST['numero16'])) {$numero16 = $_REQUEST['numero16']; $cantidadSeleccionados++; } else{$numero16=null;}
        if (isset($_REQUEST['numero17'])) {$numero17 = $_REQUEST['numero17']; $cantidadSeleccionados++; } else{$numero17=null;}
        if (isset($_REQUEST['numero18'])) {$numero18 = $_REQUEST['numero18']; $cantidadSeleccionados++; } else{$numero18=null;}
        if (isset($_REQUEST['numero19'])) {$numero19 = $_REQUEST['numero19']; $cantidadSeleccionados++; } else{$numero19=null;}
        if (isset($_REQUEST['numero20'])) {$numero20 = $_REQUEST['numero20']; $cantidadSeleccionados++; } else{$numero20=null;}
        if (isset($_REQUEST['numero21'])) {$numero21 = $_REQUEST['numero21']; $cantidadSeleccionados++; } else{$numero21=null;}
        if (isset($_REQUEST['numero22'])) {$numero22 = $_REQUEST['numero22']; $cantidadSeleccionados++; } else{$numero22=null;}
        if (isset($_REQUEST['numero23'])) {$numero23 = $_REQUEST['numero23']; $cantidadSeleccionados++; } else{$numero23=null;}
        if (isset($_REQUEST['numero24'])) {$numero24 = $_REQUEST['numero24']; $cantidadSeleccionados++; } else{$numero24=null;}
        if (isset($_REQUEST['numero25'])) {$numero25 = $_REQUEST['numero25']; $cantidadSeleccionados++; } else{$numero25=null;}
        if (isset($_REQUEST['numero26'])) {$numero26 = $_REQUEST['numero26']; $cantidadSeleccionados++; } else{$numero26=null;}
        if (isset($_REQUEST['numero27'])) {$numero27 = $_REQUEST['numero27']; $cantidadSeleccionados++; } else{$numero27=null;}
        if (isset($_REQUEST['numero28'])) {$numero28 = $_REQUEST['numero28']; $cantidadSeleccionados++; } else{$numero28=null;}
        if (isset($_REQUEST['numero29'])) {$numero29 = $_REQUEST['numero29']; $cantidadSeleccionados++; } else{$numero29=null;}
        if (isset($_REQUEST['numero30'])) {$numero30 = $_REQUEST['numero30']; $cantidadSeleccionados++; } else{$numero30=null;}
        if (isset($_REQUEST['numero31'])) {$numero31 = $_REQUEST['numero31']; $cantidadSeleccionados++; } else{$numero31=null;}
        if (isset($_REQUEST['numero32'])) {$numero32 = $_REQUEST['numero32']; $cantidadSeleccionados++; } else{$numero32=null;}
        if (isset($_REQUEST['numero33'])) {$numero33 = $_REQUEST['numero33']; $cantidadSeleccionados++; } else{$numero33=null;}
        if (isset($_REQUEST['numero34'])) {$numero34 = $_REQUEST['numero34']; $cantidadSeleccionados++; } else{$numero34=null;}
        if (isset($_REQUEST['numero35'])) {$numero35 = $_REQUEST['numero35']; $cantidadSeleccionados++; } else{$numero35=null;}
        if (isset($_REQUEST['numero36'])) {$numero36 = $_REQUEST['numero36']; $cantidadSeleccionados++; } else{$numero36=null;}
        if (isset($_REQUEST['numero37'])) {$numero37 = $_REQUEST['numero37']; $cantidadSeleccionados++; } else{$numero37=null;}
        if (isset($_REQUEST['numero38'])) {$numero38 = $_REQUEST['numero38']; $cantidadSeleccionados++; } else{$numero38=null;}
        if (isset($_REQUEST['numero39'])) {$numero39 = $_REQUEST['numero39']; $cantidadSeleccionados++; } else{$numero39=null;}
        if (isset($_REQUEST['numero40'])) {$numero40 = $_REQUEST['numero40']; $cantidadSeleccionados++; } else{$numero40=null;}
        if (isset($_REQUEST['numero41'])) {$numero41 = $_REQUEST['numero41']; $cantidadSeleccionados++; } else{$numero41=null;}
        if (isset($_REQUEST['numero42'])) {$numero42 = $_REQUEST['numero42']; $cantidadSeleccionados++; } else{$numero42=null;}
        if (isset($_REQUEST['numero43'])) {$numero43 = $_REQUEST['numero43']; $cantidadSeleccionados++; } else{$numero43=null;}
        if (isset($_REQUEST['numero44'])) {$numero44 = $_REQUEST['numero44']; $cantidadSeleccionados++; } else{$numero44=null;}
        if (isset($_REQUEST['numero45'])) {$numero45 = $_REQUEST['numero45']; $cantidadSeleccionados++; } else{$numero45=null;}
        if (isset($_REQUEST['numero46'])) {$numero46 = $_REQUEST['numero46']; $cantidadSeleccionados++; } else{$numero46=null;}
        if (isset($_REQUEST['numero47'])) {$numero47 = $_REQUEST['numero47']; $cantidadSeleccionados++; } else{$numero47=null;}
        if (isset($_REQUEST['numero48'])) {$numero48 = $_REQUEST['numero48']; $cantidadSeleccionados++; } else{$numero48=null;}
        if (isset($_REQUEST['numero49'])) {$numero49 = $_REQUEST['numero49']; $cantidadSeleccionados++; } else{$numero49=null;}
        if (isset($_REQUEST['numero50'])) {$numero50 = $_REQUEST['numero50']; $cantidadSeleccionados++; } else{$numero50=null;}
        
        //Contabilizar los aciertos con bucles
        for ($i = 1; $i <= 6; $i++){
            $loteria = ${'loteria' . $i};
        
            for ($j = 1; $j <= 50; $j++) {
                $numero = ${'numero' . $j}; 
                
                if ($loteria == $numero) {
                    $aciertos++;
                }
            }
        }

        /* Bucle para mantener la creación de variables con ternarios (Como en ejer2Loteria) en vez de if normales y contabilizar la cantidad de números seleccionados en el formulario(Checkbox).
        for ($i=0; $i <=50 ; $i++) { 
            $numero = ${'numero' . $i}; 
            if(!$numero==null){
                $cantidadSeleccionados++;
            }
        }
         */
        

        //Mostrar en una tabla los números ganadores (ocultar solo usar para comprobar que todo estaa correcto) 
        echo "<table><tr><td>$loteria1</td><td>$loteria2</td><td>$loteria3</td><td>$loteria4</td><td>$loteria5</td><td>$loteria6</td></tr></table>";
        echo "<h1>Resultado de la Loteria</h1>";

        //Controlar que no selecciones mas de 6 números.
        if($cantidadSeleccionados>6){
            echo "<h3>Has seleccionado más de 6 números no hagas trampas.</h3>";
        }else{
        echo "<table>";
        $aux = 1;
        for ($i=0; $i < 10 ; $i++) { 
            echo "<tr>";
            for ($j=0; $j < 5; $j++) {
                $color="grey";//el resto de números
                if (isset($_REQUEST["numero$aux"])) {
                    if ($aux == $loteria1 || $aux == $loteria2 || $aux == $loteria3 || $aux == $loteria4 || $aux == $loteria5 || $aux == $loteria6) {
                        $color = "green"; // Acierto
                    } else {
                        $color = "black"; // Fallo
                    }
                } else if ($aux == $loteria1 || $aux == $loteria2 || $aux == $loteria3 || $aux == $loteria4 || $aux == $loteria5 || $aux == $loteria6) {
                    $color = "red"; // Ganador sin seleccionar
                }
                echo "<td style='color:$color'>$aux</td>";
                $aux++;
            }
            echo "</tr>";
        }
        echo"</table>";
        echo "<br><br>";
        
        if ($aciertos<4) {
            echo "<h1>Has tenido menos de 4 aciertos</h1>";
            
        }elseif($aciertos==4){
            echo "<h1>Has tenido 4 aciertos dinero devuelto</h1>";
        }else if($aciertos == 5){
            echo "<h1>Has obtenido 5 aciertos. Has ganado 30€. Enhorabuena!!</h1>";
            $cuenta +=30;
        }else if($aciertos == 6){
            echo "<h1>Has obtenido 6 aciertos. Has ganado 100€. Enhorabuena!!</h1>";
            $cuenta +=100;
        }

        if ($serie == $loteriaSerie) {
            echo "<h2>Enhorabuena!! has acertado la serie!! Ganas 600€</h2>";
            $cuenta+=600;
        }

        echo"<h3>Tienes en tu cuenta $cuenta €</h3>";

        echo "<h4>Total de aciertos: $aciertos</h4>";
        }
    ?>
</body>
</html>