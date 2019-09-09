<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="../css/style.css">
    <script
            src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>
</head>
<body>
<header>
    <ul class="float" id="menu">
        <li><a href="../index.php">Home</a></li>
        <?php
            if (isset($_SESSION['role'])) {
                print '<li><a href="../controllers/productsController.php">Products</a></li>';
                print '<li><a href="basket.php">Basket</a></li>';
                if ($_SESSION['role'] == 'admin') print '<li><a href="addProduct.php">Add Product</a></li>';
                print '<li><a href="logout.php">Sign out</a></li>';
            } else {
                print '<li><a href="login.php">Sign In</a></li>';
                print '<li><a href="register.php">Sign Up</a></li>';
            }
        ?>
    </ul>
</header>
<div class="clear"></div>