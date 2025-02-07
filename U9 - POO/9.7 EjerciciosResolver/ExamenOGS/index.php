<?php
include_once 'Email.php';
include_once 'libreria.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location:login.php');
}

if (isset($_REQUEST['cerrar'])) {
    unset($_SESSION['usuario']);
    setcookie("usuario", "",-1);
    header('Location:login.php');
}

if (!isset($_SESSION['emails'])) {
    $_SESSION['emails']=null;
}
if ($_SESSION['emails']==null) {
    $fp = fopen("emails.txt","r");
    while (!feof($fp)) {
        $linea = fgets($fp);
        $linea = trim($linea);
        $partes = explode(",", $linea);
        if ($linea !="") {
            $objEmail = new Email($partes[0],$partes[1],$partes[3],$partes[2]);
            if ($objEmail->comprobarImportante()) {
                $_SESSION['importantes']++;
            }
            $_SESSION['emails'][]=base64_encode(serialize($objEmail));
        }
        
    }
}

if (isset($_REQUEST['emisor'])&&isset($_REQUEST['receptor'])&&isset($_REQUEST['asunto'])) {
    $emisor = $_REQUEST['emisor'];
    $receptor = $_REQUEST['receptor'];
    $asunto = $_REQUEST['asunto'];
    $fecha = date("d-m-Y",time());
    $emailOb = new Email($emisor,$receptor,$asunto,$fecha);

    $_SESSION['emails'][] = base64_encode(serialize($emailOb));

    añadirEmail($emailOb);
}

if (isset($_REQUEST['destacar'])) {
    $indice =$_REQUEST['destacar'];
    $email = $_SESSION['emails'][$indice];
    $email = unserialize(base64_decode($email));
    
    if (!$email->comprobarImportante()) {
        $email->destacarAsunto();
        $_SESSION['emails'][$indice] = base64_encode(serialize($email));
        actualizarFichero();
    }
    
}

if (isset($_REQUEST['retrasar'])) {
    $indice2 = $_REQUEST['retrasar'];
    $mail = $_SESSION['emails'][$indice2];
    $mail = unserialize(base64_decode($mail));
    echo $mail->retrasarEnvio();

    $_SESSION['emails'][$indice2] = base64_encode(serialize($mail));

    actualizarFichero();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr,td,th,table{
            border: 1px,solid,black;
        }
    </style>
</head>
<body>
    <h1>Bienvenid@ <?= $_SESSION['usuario'] ?></h1>
    <h2>Cantidad de emails importantes <?= Email::getImportantes() ?></h2>
    <form action="" method="post">
        <input type="hidden" name="emisor" value="<?= $_SESSION['usuario'] ?>">
        <?php
        $usuarios = usuariosFichero("emails.txt");
        ?>
        <label for="">Receptor</label>
        <select name="receptor" id="">
        <?php
        foreach ($usuarios as $key => $usuario) {
            ?>
            <option value="<?= $usuario ?>"><?= $usuario ?></option>
            <?php
        }
        ?>
        </select>
        <label for="">Asunto</label>
        <input type="text" name="asunto" id="">
        <input type="submit" value="Registrar Correo">
    </form>
<br><br>
    <table>
        <tr colspan="6">
            <th>Listado de Emails</th>
        </tr>
        <tr>
            <th>Emisor</th>
            <th>Receptor</th>
            <th>Fecha</th>
            <th>Asunto</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($_SESSION['emails'] as $key => $email) {
            $email = unserialize(base64_decode($email));
            ?>
            <tr>
                <td><?= $email->getEmisor() ?></td>
                <td><?= $email->getReceptor() ?></td>
                <td><?= $email->getFecha() ?></td>
                <?php
                if ($email->comprobarImportante()) {
                    ?>
                    <td style="color: green;"><?= $email->getAsunto() ?></td>
                    <?php
                }else {
                    ?>
                    <td><?= $email->getAsunto() ?></td>
                    <?php
                }

                if ($email->getEmisor()===$_SESSION['usuario']) {
                    ?>
                    <td>
                        <form action="" method="post">
                            <input type="submit" value="Destacar">
                            <input type="hidden" name="destacar" value="<?= $key ?>">

                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="submit" value="Retrasar">
                            <input type="hidden" name="retrasar" value="<?= $key ?>">
                        </form>
                    </td>
                    <?php
                }
                ?>
                
            </tr>
            <?php
        }
        ?>
    </table>

    <form action="" method="post">
        <input type="submit" value="Cerrar Sesion">
        <input type="hidden" name="cerrar">
    </form>
</body>
</html>