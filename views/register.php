<?php

$title = 'Register';

if (isset($_SESSION['role'])) {
    header('Refresh: 0; url=../index.php');
}
else {
    require_once 'header.php';
    ?>
    <div class="formBlock">
        <h1>Registration</h1>
        <form method="post" action="../controllers/registerController.php">
            <input type="text" name="cust_name" placeholder="Write your name" required><br>
            <input type="password" name="password" placeholder="Write password" required><br>
            <input type="text" name="city" placeholder="Write your city"><br>
            <input type="text" name="state" placeholder="Write your state (2 characters)"><br>
            <input type="text" name="phone" placeholder="Write your phone (10 characters)" required><br>

            <input type="submit" name="submit" value="Register account">
        </form>
    </div>

    <?php
}

require_once 'footer.php';