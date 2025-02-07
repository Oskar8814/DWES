<!-- Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción). 
Utiliza un array asociativo para almacenar las parejas de palabras. 
El programa pedirá una palabra en español y dará la correspondiente traducción en inglés. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Traductor de Españo - Ingles</h1>
    <form action="#" method="post">
        Introduce una palabra
        <input type="text" name="palabra">
        <input type="submit" value="Enviar">
    </form>
    <?php
        $diccionario = ['hola'=>'hello','mundo'=>'world','casa'=>'house','perro'=>'dog','gato'=>'cat', 'libro'=>'book','amor'=>'love', 'comida'=>'food', 'escuela'=>'school','familia'=>'family'];
        
        if(isset($_REQUEST['palabra'])){
            
            $palabra = $_REQUEST['palabra'];
            //array_key_exists($palabra, $diccionario) podria usar esta forma en vez del isset como condicion en el if/else
            if(isset($diccionario[$palabra])){
                echo "<h2>La traducción al ingles de $palabra es : $diccionario[$palabra] </h2>";
            }else{
                echo "<h2>La palabra $palabra no se encuentra en el diccionario.</h2>";
            }
        }else{
            $palabra = "";
        }
    ?>
</body>
</html>