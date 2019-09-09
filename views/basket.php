<?php
$title = 'Basket';
require_once 'header.php';
$i = 0;

session_start();

if (isset($_SESSION['role'])) {
    if (isset($_SESSION['basket']) && $_SESSION['basket'] != []) {
        foreach ($_SESSION['basket'] as $product_id => $qty) {
            ?>
            <div class="formBlock" style="padding-top: 10px">
                <form id="form<?=++$i?>" method="post">
                    <p><b>Product Name:</b> <?=$_SESSION['data'][$product_id]['product_name'] ?></p>
                    <p><b>Price:</b> <?=$_SESSION['data'][$product_id]['product_price'] ?></p>
                    <p><b>Materials and environment:</b> <?=$_SESSION['data'][$product_id]['materials and environment'] ?></p>
                    <p><b>Info:</b> <?=$_SESSION['data'][$product_id]['product info'] ?></p>
                    <p><b>Quantity:</b> <?=$qty ?></p>
                    <input type="hidden" name="product_id" value="<?=$product_id ?>">
                    <input type="submit" name="submit" value="Delete From Basket">
                </form>
            </div>
            <script type="text/javascript">
                $("#form<?=$i?>").submit(function(event) {
                    event.preventDefault();
                    $.post('../controllers/deleteFromBasketController.php', $("#form<?=$i?>").serialize(),
                        function(data) {
                            alert(data);
                            location.reload();
                        });
                });
            </script>
            <?php
        }
        ?>
        <form class="formBlock buy" method="post" id="buy">
            <input type="submit" name="submit" value="Buy products">
        </form>
        <script type="text/javascript">
            $("#buy").submit(function(event) {
                event.preventDefault();
                $.post('../controllers/paymentController.php', $("#buy").serialize(),
                    function() {
                        window.location.href = "buy.php";
                    });
            });
        </script>
        <?php
        require_once 'footer.php';
    }
    else {
        print('Your shopping basket is empty. Go to Products =)');
    }

}
else {
    header('Refresh: 0; url=../index.php');
}