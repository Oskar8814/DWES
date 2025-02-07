<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Ejercicio 1. Imprimir carácter por carácter un string dado, cada uno en una línea distinta.
    echo "<br> Ejercicio 1 <br>";
    $cadenaA = "Ejercicio 1 Imprimir carácter por carácter un string dado, cada uno en una línea distinta.";
    for ($i=0; $i < strlen($cadenaA); $i++) { 
        echo $cadenaA[$i]. "<br>";
    }

    //Ejercicio 2. Cambiar todas las vocales de la frase “Tengo una hormiguita en la patita, que me esta haciendo 
    //cosquillitas y no me puedo aguantar” por otra vocal pedida al usuario.
    echo "<br>------------- Ejercicio 2 ------------- <br>";
    $text = "Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar";
    $vocal = "a";
    echo(str_replace(["a","e","i","o","u"],$vocal,$text));

    //Ejercicio 3. Contar cuantas palabras tiene una frase introducida por el usuario, ten en cuenta que el usuario 
    //puede poner varios espacios seguidos, incluso al principio o al final.
    echo "<br>------------- Ejercicio 3 ------------- <br>";
    $cadena = "Ejercicio 1 Imprimir carácter por carácter un string dado, cada uno en una línea distinta.";
    $cadena2 = " Hello  World   H!! ";
    $aux = 0;
    do {
        $cadena2 = trim($cadena2);
        $cadena2 = strstr($cadena2, ' ');
        $aux++;
    } while (strlen($cadena2)>0);
    echo "<br>";
    echo "La cadena del ejercicio tiene $aux palabras";
    //Ejercicio 4. Verificar si un string leído por teclado finaliza con la misma palabra que empieza.
    echo "<br>------------- Ejercicio 4 ------------- <br>";
    $cadena4 = "Ejercicio 1 Imprimir carácter por carácter un string dado, cada uno en una línea distinta";
    $cadena4 = trim($cadena4);
    $pos = strpos($cadena4, " ");
    $palabra = substr($cadena4, -$pos);//cogemos la ultima palabra
    $palabra2 = substr($cadena4,0,$pos);
    echo "<br>";
    
    if ($palabra === $palabra2) {
        echo "Las palabras $palabra y $palabra2 son iguales";
    }else {
        echo "Las palabras $palabra y $palabra2 son diferentes";
    }
    
    //Ejercicio 5. Intercambiar un string dado, hasta volverlo a su forma original: ejemplo: Hola, ahol, laho, olah, hola (stop).
    echo "<br>------------- Ejercicio 5 ------------- <br>";
    echo "<br>";
    $cadena5 = "hola";
    $original = $cadena5;

        do {
            // Va cogiendo el último carácter y lo pone al inicio
            $aux = substr($cadena5, -1);       // Último carácter
            $aux2 = substr($cadena5, 0, -1);   // Todo menos el último carácter
            $cadena5 = $aux . $aux2;           // Combinar para mostrar rotado

            echo "$cadena5  ";                 
        } while ($cadena5 !== $original);      

    //Ejercicio 6. Dado un párrafo con dos frases (separadas por un punto), contar cuántas palabras tiene cada frase.
    echo "<br>------------- Ejercicio 6 ------------- <br>";

    $frases = "Intercambiar un string dado hasta volverlo a su forma original. Dado un párrafo con dos frases (separadas por un punto), contar cuántas palabras tiene cada frase";
    $pos =  strpos($frases,".");
    $frase1 = substr($frases,0,$pos);
    $frase2 = substr($frases,$pos+1);
    echo "$frase1 <br>";
    echo "$frase2";

    $aux2 = 0;
    do {
        $frase1 = trim($frase1);
        $frase1 = strstr($frase1, ' ');
        $aux2++;
    } while (strlen($frase1)>0);
    echo "<br>";
    echo "La primera frase del ejercicio tiene $aux2 palabras";
    $aux3 = 0;
    do {
        $frase2 = trim($frase2);
        $frase2 = strstr($frase2, ' ');
        $aux3++;
    } while (strlen($frase2)>0);
    echo "<br>";
    echo "La segunda frase del ejercicio tiene $aux3 palabras";

    //Ejercicio 7. Verificar si en una frase se encuentra una determinada palabra pedida al usuario. 
    echo "<br>------------- Ejercicio 7 ------------- <br>";
    echo "<br>";
    $encuentra = mb_stripos($frases,"string");
    if ($encuentra != false) {
        echo "La palabra se encuentra en la posición $encuentra";
    }else {
        echo "La palabra no se encuentra en la frase.";
    }

    //Ejercicio 8 Pedir un string al usuario e imprimir todos los números seguidos y sin espacios, 
    //correspondientes al código ascii de cada uno de sus caracteres. Posteriormente calcular la frase 
    //original a partir de dichos números (usar un array).
    echo "<br>------------- Ejercicio 8 ------------- <br>";
    echo "<br>";
    $string = "Pedir un string al usuario";
    $array = str_split($string);
    $arrayAsc=[];
    $asc = null;
    for ($i=0; $i < count($array) ; $i++) { 
        $arrayAsc [] = ord($array[$i]);
        $asc = $asc.ord($array[$i]);
    }
    echo "$asc";
    echo "<br>";
    $fraseAsc = "";
    for ($i=0; $i < count($arrayAsc) ; $i++) { 
        $fraseAsc = $fraseAsc.chr($arrayAsc[$i]);
    }
    echo "$fraseAsc";

    //Ejercicio 9. Pedir al usuario una cadena de caracteres e imprimirla invertida
    echo "<br>------------- Ejercicio 9 ------------- <br>";
    $fraseInvertirla = "Pedir al usuario una cadena de caracteres e imprimirla invertida";
    $fraseInvertida = strrev($fraseInvertirla);
    echo "<br>";
    echo "$fraseInvertida";

    //Ejercicio 10. Escribir un programa que pida un nombre (con sus apellidos) y escriba en pantalla tanto el 
    //nombre con las primeras letras en mayúsculas como las iniciales de dicho nombre.
    echo "<br>------------- Ejercicio 10 ------------- <br>";

    $nombreApellidos = "oscar garcía sánchez";
    $nombreApellidos = ucwords($nombreApellidos);
    echo "<br>";
    echo "$nombreApellidos";
    // Divir el nombre y apellidos en palabras con explode
    $palabras = explode(" ", $nombreApellidos);

    // Obtiene las iniciales
    $iniciales = "";
    foreach ($palabras as $palabra) {
        if (!empty($palabra)) {
            $iniciales .= strtoupper($palabra[0]);
        }
    }
    echo "<br>";
    echo "Iniciales: $iniciales";

    //Ejercicio 11. Escribir una clase que lea n caracteres que forman un número romano y que imprima: 
        //si la entrada fue correcta, un string que represente el equivalente decimal
        //si la entrada fue errónea, un mensaje de error.
        //Nota: La entrada será correcta si contiene solo los caracteres M:1000, D:500, C:100, L:50, X:10, I:1. 
        //No se tendrá en cuenta el orden solo se sumará el valor de cada letra.
        echo "<br>------------- Ejercicio 11 ------------- <br>";
        echo "<br>";
        $romano ="MMXXIIII";
        
        if (preg_match('/^[MDCLXVI]+$/i',$romano)) {
            echo "La entrada es correcta";

            $valores = [
                'I' => 1,
                'V' => 5,
                'X' => 10,
                'L' => 50,
                'C' => 100,
                'D' => 500,
                'M' => 1000
            ];

            $decimal = 0;
            for ($i=0; $i < strlen($romano); $i++) { 
                $decimal += $valores[$romano[$i]]; 
            }
            echo "<br>";
            echo "El valor en decimal es $decimal";
        }else{
            echo "La entrada es incorrecta";
        }

    //Ejercicio 12. Escribir un programa que dado un texto de un telegrama que termina en punto:
        //contar la cantidad de palabras que posean más de 10 letras
        //reportar la cantidad de veces que aparece cada vocal 
        //reportar el porcentaje de espacios en blanco.
        //Nota: Las palabras están separadas por un espacio en blanco.

        echo "<br>------------- Ejercicio 12 ------------- <br>";
        echo "<br>";
        $telegrama = "Se utilizar para modificar la forma en que se evalúan las expresiones regulares. Se incluyen justo después del delimitador de la expresión regular y se pueden utilizar varios a la vez.";
        $telegrama2 = "Sala ascraba can la a";
        $palabrasTelegrama = explode(" ",$telegrama);
        $mayor10 = 0;
        foreach ($palabrasTelegrama as $palabra) {
            if (strlen($palabra)>10) {
                $mayor10++;
            }
        }
        echo "La cantidad de palabras con más de 10 letras es $mayor10";
        echo "<br>";
        $a = 0; $e = 0; $i2 = 0; $o = 0; $u = 0; $espacio = 0;

        for ($i=0; $i < strlen($telegrama); $i++) { 
            
            if (strtolower($telegrama[$i]) == 'a') {
                $a++;
            }elseif(strtolower($telegrama[$i]) == 'e'){
                $e++;
            }elseif(strtolower($telegrama[$i]) == 'i'){
                $i2++;
            }elseif(strtolower($telegrama[$i]) == 'o'){
                $o++;
            }elseif(strtolower($telegrama[$i]) == 'u'){
                $u++;
            }elseif(strtolower($telegrama[$i]) == ' '){
                $espacio++;
            }
        }
        echo "a = $a <br>";
        echo "e = $e <br>";
        echo "i = $i2 <br>";
        echo "o = $o <br>";
        echo "u = $u <br>";
        echo " ' ' = $espacio <br>";
        
        $porcentaje =(int) ($espacio*100 / strlen($telegrama));
        echo " El porcentaje de espacios en blanco es $porcentaje%";

    //Escribir un programa que dado un texto que finaliza en punto, se pide: 
        //la posición inicial de la palabra más larga y su longitud
        //cuantas palabras con una longitud entre 8 y 16 caracteres poseen más de tres veces la vocal “a”
        echo "<br>------------- Ejercicio 13 ------------- <br>";
        $texto1 = "Elaborar procedimientos adecuados para incrementar la productividad representa una tarea signaficativa, especialmente cuando se busca equilibrar calidad con eficiencia.";
        $palabrasText = explode (" " ,$texto1);
        
        $mayor = 0;
        $palabraMayor = "";
        for ($i=0; $i < count($palabrasText); $i++) { 
            if (strlen($palabrasText[$i])>$mayor) {
                $mayor = strlen($palabrasText[$i]);
                $palabraMayor = $palabrasText[$i];
            }
        }
        $posi = strpos($texto1, $palabraMayor);
        echo "<br>";
        echo "La palabra mas larga es $palabraMayor con $mayor caracteres y se encuentra en la posición $posi.";

        $contadorPalabras = 0;
        foreach ($palabrasText as $key => $palabra) {
            if (strlen($palabra)>=8 && strlen($palabra)<=16){
                $contador = contarVocal($palabra);
                if ($contador>=3) {
                    $contadorPalabras++;
                }
            }
        }

        echo "<br>";
        echo "La cantidad de palabras con las caracteristicas deseadas es $contadorPalabras.";

        //Funcion para contar vocales/letras (en nuestro caso la a)
        
        function contarVocal($palabra){
            $aux = 0;
            for ($i=0; $i < strlen($palabra); $i++) { 
                if(strtolower($palabra[$i])==='a'){
                    $aux++;
                }
            }
            return $aux;
        }
    ?>
</body>
</html>