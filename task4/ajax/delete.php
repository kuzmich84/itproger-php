<?php

require_once '../mysql_connect.php';

$login = $_POST['login'];
echo $login;

$sql = 'DELETE FROM `users` WHERE `users`.`login` = :login ';

$query = $pdo->prepare($sql);
$query->execute(['login' => $login]);