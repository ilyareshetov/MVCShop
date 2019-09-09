<?php
require_once '../model/db.php';

if (isset($_SESSION['role'])) {
    header('Refresh: 0; url=../index.php');
}
else {
    if (isset($_POST['submit'])) {
        $db = new DB();
        $get = $db->login($_POST['cust_name']);
        $hash = $get->fetch_assoc();
        if (!$hash) {
            header('Refresh: 3; url=../views/login.php');
            print('Username incorrect!!! Updating the page in 3 seconds');
        }
        else {
            $answer = password_verify($_POST['password'], $hash['password']);
            if ($answer) {
                session_start();
                $get = $db->getUserInfo($_POST['cust_name']);
                $res = $get->fetch_assoc();
                $_SESSION['user'] = $res['cust_id'];
                $_SESSION['role'] = $res['role'];
                header('Refresh: 0; url=../index.php');
            }
            else {
                header('Refresh: 3; url=../views/login.php');
                print('Password incorrect!!! Updating the page in 3 seconds');
            }
        }
    }
}