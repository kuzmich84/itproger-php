<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];

setcookie('name', $_POST['name'], time() +3600);
setcookie('email', $_POST['email'], time() +3600);
?>