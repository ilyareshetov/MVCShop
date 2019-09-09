<?php
session_start();

$total_price = 0;

if (isset($_SESSION['role'])) {
    foreach ($_SESSION['basket'] as $product_id => $qty) {
        $total_price += $_SESSION['data'][$product_id]['product_price'] * $qty;
    }
    $_SESSION['total'] = $total_price;
}