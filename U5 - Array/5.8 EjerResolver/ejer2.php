<!-- Realizar  una  página  web  para  realizar  pedidos  de  comida  rápida.  Tenemos  varios  tipos  de 
comida: Pizza: jamon, atun, bacon, pepperoni; Hamburguesa: lechuga, tomate, queso; Perrito 
caliente: lechuga, cebolla, patata; etc (la carta con todas las comidas y sus ingredientes estará 
almacenada en un array). A través de formularios distintos, uno para cada tipo de comida se va 
añadiendo  comida  al  pedido  con  sus  respectivos  ingredientes,  hasta  que  se  pulse  el  botón 
finalizar pedido (en otro formulario), con lo que se mostrará el pedido completo en una tabla, 
con  toda  la  comida  y  los  ingredientes  seleccionados  de  cada  una.  Usa  la  función  serialize()  y 
unserialize() para pasar arrays como cadenas Nota: con arrays de 2 dimensiones la serialización 
se corrompe, así que hay que usar la función en combinación con otra de la siguiente forma:   -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/U5 - Array/5.8 EjerResolver/css/style2.css">
</head>
<body>
    <?php
        $cartaComidas = [
            "Hamburguesa" => ["Lechuga", "Tomate", "Queso", "Bacon", "Huevo"],
            "Perrito Caliente" => ["Lechuga", "Cebolla", "Patata", "Mostaza", "Ketchup"],
            "Pizza" => ["Jamon", "Atun", "Bacon", "Pepperoni", "Queso extra", "Champiñones"],
            "Tradicional" => ["Puchero", "Ensalada", "Croquetas", "Tortilla", "Gazpacho"],
            "Tacos" => ["Carne picada", "Queso", "Salsa picante", "Guacamole", "Frijoles"],
            "Burrito" => ["Arroz", "Carne", "Frijoles", "Salsa", "Queso"],
            "Sushi" => ["Salmón", "Aguacate", "Pepino", "Atún", "Queso crema"],
            "Ensalada César" => ["Lechuga", "Pollo", "Crutones", "Queso parmesano", "Salsa César"],
            "Pasta Carbonara" => ["Pasta", "Bacon", "Huevo", "Queso parmesano", "Pimienta"],
            "Pollo Asado" => ["Pollo", "Patatas", "Pimientos", "Cebolla", "Ajo"],
            "Falafel" => ["Falafel", "Hummus", "Ensalada", "Pan pita", "Salsa de yogur"],
            "Chili con Carne" => ["Carne picada", "Frijoles", "Tomate", "Chile", "Cebolla"],
            "Sopa de Mariscos" => ["Gambas", "Mejillones", "Calamares", "Tomate", "Pimientos"],
            "Paella" => ["Arroz", "Mariscos", "Pollo", "Pimientos", "Guisantes", "Azafrán"],
            "Shawarma" => ["Pollo", "Ternera", "Lechuga", "Tomate", "Salsa de ajo", "Pan pita"],
            "Lasagna" => ["Pasta", "Carne", "Tomate", "Queso", "Bechamel"]
        ];
        
        // $p = count($cartaComidas["Hamburguesa"]);
        // var_dump($p);
        if (isset($_REQUEST['fin'])) {
            echo"<div class = 'contenedor2'>";
            echo "<h2>Lista de Pedidos</h2>";
            $pedido = unserialize(base64_decode($_REQUEST['fin']));
            
            echo "<p>";
            foreach ($pedido as $key => $comida) {
                echo "$comida[0] : ";
                for ($i=1; $i < count($comida) ; $i++) { 
                    echo "$comida[$i], ";
                }
                echo "<br>";
            }
            echo"</p>";
            echo "</div>";
        }else{
            
            if (!isset($_REQUEST['comida'])) {
                $pedido = [];
            }else {
                $pedido = unserialize(base64_decode($_REQUEST['pedido']));
                $comida = $_REQUEST['comida'];
                $pedido[] = $comida;
            }
            foreach ($cartaComidas as $platos => $ingredientes) {
                ?>
                <div class="container">
                <form action="#" method="post">
                    <h3><?= $platos ?></h3>
                    <input type="hidden" name="comida[]" value="<?= $platos ?>"> <!--  -->
                    <input type="hidden" name="pedido" value="<?= base64_encode(serialize($pedido))?>"> <!-- Envia todas las comidas seleccionadas hasta el momento -->
                    <div class="checkbox-grid">
                    <?php
                    foreach($ingredientes as $ingrediente) {
                        ?>
                        <label><input type="checkbox" name="comida[]" id="" value="<?= $ingrediente ?>"> <?= $ingrediente ?></label> <!--  -->
                        <?php
                    }
                    ?>
                    </div>
                    <br><br>
                    <input type="submit" value="Añadir al pedido">
                </form>
                </div>
                <?php
            }
            ?>

            <br>
            <form action="#" method="post">
                <input type="hidden" name="fin" value="<?= base64_encode(serialize($pedido)) ?>">
                <input type="submit" value="Enviar los pedidos">
            </form>
            <?php
        }
    ?>
</body>
</html>