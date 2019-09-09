<?php
$title = 'Add Product';
require_once 'header.php';

session_start();

if ($_SESSION['role'] == 'admin') {
    ?>
    <div class="formBlock" style="padding-top: 10px">
        <form method="post" action="../controllers/addProductController.php">
            <p><b>Product Name</b></p>
            <input type="text" name="product_name">
            <p><b>Price</b></p>
            <input type="text" name="product_price">
            <p><b>Materials and environment:</b></p>
            <textarea name="materials_and_environment"></textarea>
            <p><b>Info:</b></p>
            <textarea name="product_info"></textarea><br><br>
            <input type="submit" name="submit" value="Add to Products">
        </form>
    </div>
    <?php
    require_once 'footer.php';
}
else {
    header('Refresh: 0; url=../index.php');
}