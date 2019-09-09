<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web application</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <?php
            if (isset($_SESSION['role'])) {
                print '<li><a href="controllers/productsController.php">Products</a></li>';
                print '<li><a href="views/basket.php">Basket</a></li>';
                if ($_SESSION['role'] == 'admin') print '<li><a href="views/addProduct.php">Add Product</a></li>';
                print '<li><a href="views/logout.php">Sign out</a></li>';
            }
            else {
                print '<li><a href="views/login.php">Sign In</a></li>';
                print '<li><a href="views/register.php">Sign up</a></li>';
            }
        ?>

    </ul>
</header>
<div class="clear"></div>

<div class="formBlock" style="padding-top: 0px;">
    <h2>Welcome to the Home Depot web application</h2>
</body>
</html>