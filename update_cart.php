<?php
session_start();
include 'includes/DBConn.php';
include 'includes/ShoppingCart.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$cart = new ShoppingCart();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart']) && isset($_POST['qty'])) {
    foreach ($_POST['qty'] as $id => $qty) {
        $cart->updateQuantity((int)$id, (int)$qty);
    }
}
header("Location: user_dashboard.php");
exit();
?>