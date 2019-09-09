<?php
$title = 'Products';
require_once 'header.php';
$i = 0;

session_start();

if (isset($_SESSION['role'])) {
    foreach ($_SESSION['data'] as $product) {
        ?>
        <div class="formBlock" style="padding-top: 10px">
            <form id="form<?=++$i?>" method="post" action="../controllers/addToBasketController.php">
                <p><b>Product Name:</b> <?=$product['product_name'] ?></p>
                <p><b>Price:</b> <?=$product['product_price'] ?></p>
                <p><b>Materials and environment:</b> <?=$product['materials and environment'] ?></p>
                <p><b>Info:</b> <?=$product['product info'] ?></p>
                <p><b>Quantity:</b><input type="text" name="qty" id="qty" style="width: 20px;" required></p>
                <input type="hidden" name="product_id" value="<?=$product['product_id'] ?>">
                <input type="submit" name="submit" value="Add to Basket">
            </form>
        </div>
        <script type="text/javascript">
            $("#form<?=$i?>").submit(function(event) {
                event.preventDefault();
                $.post('../controllers/addToBasketController.php', $("#form<?=$i?>").serialize(),
                    function(data) {
                        alert(data);
                    });
            });
        </script>
        <?php
    }
    require_once 'footer.php';
}
else {
    header('Refresh: 0; url=../index.php');
}