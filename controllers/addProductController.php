<?php
require_once '../model/db.php';
session_start();

if (isset($_SESSION['role'])) {
    if (isset($_POST['submit'])) {
        $db = new DB();
        $db->addProduct($_POST['product_name'], (float)$_POST['product_price'], $_POST['materials_and_environment'], $_POST['product_info']);
        header('Refresh: 2; url=productsController.php');
        print('Success! Going to the products page...');
    }
    else {
        header('Refresh: 0; url=../index.php');
    }
}
else {
    header('Refresh: 0; url=../index.php');
}