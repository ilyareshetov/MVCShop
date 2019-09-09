<?php
require_once '../model/db.php';

if (isset($_SESSION['role'])) {
    header('Refresh: 0; url=../index.php');
}
else {
    if (isset($_POST['submit'])) {
        $db = new DB();
        $error = $db->register($_POST['cust_name'], password_hash($_POST['password'], PASSWORD_BCRYPT), $_POST['city'], $_POST['state'], $_POST['phone']);
        if ($error == 1) {
            header('Refresh: 3; url=../views/register.php');
            print('Same name already exists! You will be redirected within 3 seconds!');
        }
        else {
            session_start();
            $get = $db->getUserInfo($_POST['cust_name']);
            $res = $get->fetch_assoc();
            $_SESSION['user'] = $res['cust_id'];
            $_SESSION['role'] = $res['role'];
            header('Refresh: 0; url=../index.php');
        }
    }
}