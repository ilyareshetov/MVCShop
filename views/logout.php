<?php
session_start();
$_SESSION = [];
unset($_COOKIE[session_name()]);
session_destroy();
header('Refresh: 0; url=../index.php');
