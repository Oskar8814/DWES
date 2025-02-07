<!-- Mostrar en una página varios parámetros para configurar el aspecto de otra página: color de fondo, tipo de letra,
alineación del texto, imagen del banner (entre 3 posibles), y demás reglas de estilo que se te ocurran. Una vez
enviada la información se mostrará una página con el contenido que desees acorde a los estilos elegidos. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="configurador.php" method="post">
        <label for="color">Selecciona el color del fondo</label>
        <input type="color" name="color"><br><br>
        <fieldset>
            <legend>Selecciona el tipo de letra:</legend>
            <div>
                <input type="radio" id="serif" name="fuente" value="serif" />
                <label for="serif">serif</label>
                <input type="radio" id="sans-serif" name="fuente" value="sans-serif" />
                <label for="sans-serif">sans-serif</label>
                <input type="radio" id="monospace" name="fuente" value="monospace" />
                <label for="monospace">monospace</label>
            </div>
        </fieldset><br><br>
        <label for="tamaño">Selecciona el tamaño de la letra</label>
        <select name="tamaño" id="tamaño">
            <option value="small">small</option>
            <option value="medium">medium</option>
            <option value="large">large</option>
        </select><br><br>
        <fieldset>
            <legend>Selecciona la alineacion del texto:</legend>
            <div>
                <input type="radio" id="start" name="alineacion" value="start" />
                <label for="start">start</label>
                <input type="radio" id="end" name="alineacion" value="end" />
                <label for="end">end</label>
                <input type="radio" id="left" name="alineacion" value="left" />
                <label for="left">left</label>
                <input type="radio" id="right" name="alineacion" value="right" />
                <label for="right">right</label>
                <input type="radio" id="center" name="alineacion" value="center" />
                <label for="center">center</label>
                <input type="radio" id="justify" name="alineacion" value="justify" />
                <label for="justify">justify</label>
            </div>
        </fieldset><br><br>
        <select name="imagen" id="imagen">
            <option value="img/perro.jpg">Perro</option>
            <option value="img/gato.jpg">Gato</option>
            <option value="img/agapornis.jpg">Agapornis</option>
        </select><br><br>
        <input type="submit" value="Enviar">
        <form>
</form>

    </form>
</body>
</html>