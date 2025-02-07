<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_REQUEST['comprar'])) {
    $id = $_REQUEST['comprar'];
}else {
    header('Location:index.php');
}

if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]++;
}else {
    $_SESSION['carrito'][$id] = 1;
}
header('location:'.getenv('HTTP_REFERER'));
?>