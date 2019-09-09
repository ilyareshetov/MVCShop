<?php
require_once '../model/db.php';
session_start();

if (isset($_SESSION['role'])) {
    $db = new DB();
    $get = $db->selectAll();
    $_SESSION['data'] = [];
    while ($res = $get->fetch_assoc()) {
        $_SESSION['data'][$res['product_id']] = ['product_id' => $res['product_id'], 'product_name' => $res['product_name'], 'product_price' => $res['product_price'], 'materials and environment' => $res['materials and environment'], 'product info' => $res['product info']];
    }
    header('Refresh: 0; url=../views/products.php');
}
else {
    header('Refresh: 0; url=../index.php');
}