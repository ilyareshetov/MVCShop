<?php
session_start();
if (isset($_SESSION['role'])) {
    if (isset($_POST['product_id'])) {
        unset($_SESSION['basket'][$_POST['product_id']]);
        echo 'Product deleted from basket!';
    }
    else echo 'Already deleted!';

}
else {
    header('Refresh: 0; url=../index.php');
}