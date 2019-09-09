<?php
session_start();
if (isset($_SESSION['role'])) {
    if (isset($_POST['qty'])) {
        if (isset($_SESSION['basket'][$_POST['product_id']])) {
            $_SESSION['basket'][$_POST['product_id']] += $_POST['qty'];
        }
        else{
            $_SESSION['basket'][$_POST['product_id']] = $_POST['qty'];
        }
        echo 'Product added to basket!';
    }
    else echo 'Add the quantity!';

}
else {
    header('Refresh: 0; url=../index.php');
}
