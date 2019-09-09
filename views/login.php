<?php

$title = 'Sign In';

if (isset($_SESSION['role'])) {
    header('Refresh: 0; url=../index.php');
}
else {
    require_once 'header.php';
    ?>
    <div class = "formBlock">
       <h1>Sign In</h1>
        <form method="post" action="../controllers/loginController.php">
            <input type="text" name="cust_name" placeholder="Write your username"><br>
            <input type="password" name="password" placeholder="Write password"><br>

            <input type="submit" name="submit" value="login">
        </form>
    </div>
    <?php
}

require_once 'footer.php';