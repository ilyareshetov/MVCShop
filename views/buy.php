<?php
$title = 'Payment info';
require_once 'header.php';

session_start();

if (isset($_SESSION['role'])) {
    ?>
    <div class="formBlock" style="padding-top: 10px">
        <form method="post" id="accept">
            <p><b>Your total price is: <?=$_SESSION['total'] ?></b></p>
            <p><b>Please write a payment info</b></p>
            <p><b>Card number</b></p>
            <input type="text" name="card" required>
            <p><b>Name</b></p>
            <input type="text" name="name" required>
            <p><b>Extention date</b></p>
            <input type="date" name="date" required>
            <p><b>Address</b></p>
            <input type="text" name="address" required>
            <p><b>State</b></p>
            <input type="text" name="state" required>
            <p><b>Zip</b></p>
            <input type="text" name="zip" required><br><br>
            <input type="submit" name="submit" value="Buy products">
        </form>
    </div>
    <script type="text/javascript">
        $("#accept").submit(function(event) {
            event.preventDefault();
            $.post('../controllers/buyController.php', $("#accept").serialize(),
                function(data) {
                    alert(data);
                    window.location.href = "../index.php";
                });
        });
    </script>
    <?php
require_once 'footer.php';
}
else {
    header('Refresh: 0; url=../index.php');
}