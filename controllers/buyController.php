<?php
require_once '../model/db.php';
session_start();

if (isset($_SESSION['role'])) {
    if (isset($_POST['card'])) {
        $db = new DB();
        $db->insertPayment($_POST['card'], $_POST['name'], $_POST['date'], $_POST['address'], $_POST['state'], $_POST['zip']);
        $pay_id = $db->lastInsertedId();
        $db->insertOrdertable(date("Y-m-d"), (int)$_SESSION['user'], $pay_id, (int)$_SESSION['total']);
        $order_id = $db->lastInsertedId();
        foreach ($_SESSION['basket'] as $product_id => $qty) {
            $db->insertOrderline($order_id, $product_id, $qty);
        }
        unset($_SESSION['basket']);
        unset($_SESSION['total']);
        echo 'Your order has been sent for processing!';
    }
}
