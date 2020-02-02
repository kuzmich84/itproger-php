<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

$user = 'root';
$password = '';
$db = 'store';
$host = 'localhost';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;
$pdo = new PDO($dsn, $user, $password);

$login ='john';

$sql_login ='SELECT  `login`, `id` FROM `users` WHERE `login` = :login';
$query = $pdo->prepare($sql_login);
$query->execute(['login'=>$login]);

$users = $query->fetch(PDO::FETCH_OBJ);


$category = 'hats';

$sql_items ='SELECT `id`,`title`,`price`,`category` FROM `items` WHERE `category` = :category';
$query_items = $pdo->prepare($sql_items);
$query_items->execute(['category'=>$category]);

$category = $query_items->fetchAll(PDO::FETCH_OBJ);

$login_id = $users->id;

$sql_orders ='INSERT INTO orders(user_id, items_id) VALUES(:login_id, :items_id)';

$query_orders = $pdo->prepare($sql_orders);

foreach ($category as $item) {
    $query_orders->execute(['login_id'=>$login_id, 'items_id'=>$item->id]);
}

$user_id = $users->id;

$sql_result = 'SELECT * FROM `users`, `orders`,`items` WHERE orders.user_id=users.id && orders.items_id=items.id';

$query_select = $pdo->prepare($sql_result);
$query_select->execute();

$r = $query_select->fetchAll(PDO::FETCH_OBJ);


echo '<h1>Все заказы</h1>';

foreach ($r as $item) {
    echo  '<b>'.$item->login.'</b> - ' . '<span style="text-decoration: underline">'.$item->title.'</span><br>';
}


?>


</body>
</html>


