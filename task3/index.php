<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work with Data Base</title>
</head>
<body>
<?php
$user = 'root';
$password = '';
$db = 'testing';
$host = 'localhost';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;
$pdo = new PDO($dsn, $user, $password);

$query = $pdo->query('SELECT * FROM `users`');
$queryTwo = $pdo->query('SELECT * FROM `users` ORDER BY `surmame` DESC');

echo '<h1>Вывод данных из БД с помощью массива</h1>';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<h1>' . $row['login'] . '</h1>
        <p><b>Email:</b> ' . $row['email'] . '</p>
        <p><b>Имя:</b> ' . $row['name'] . '</p>
        <p><b>Фамилия:</b> ' . $row['surmame'] . '</p>';
}

echo '<h1>Вывод данных из БД с помощью объекта</h1>';
while ($row = $queryTwo->fetch(PDO::FETCH_OBJ)) {
    echo '<h1>' . $row->login . '</h1>
        <p><b>Email:</b> ' . $row->email . '</p>
        <p><b>Имя:</b> ' . $row->name. '</p>
        <p><b>Фамилия:</b> ' . $row->surmame . '</p>';
}

// выборка по полю через ?
$name ='Петр';
$id = 3;

$sql ='SELECT `name`,`id`,`email` FROM `users` WHERE `name` = :name && `id` > :id';
$query = $pdo->prepare($sql);
$query->execute(['name'=>$name, 'id'=>$id]);

$users = $query->fetchAll(PDO::FETCH_OBJ);

foreach ($users as $user) {
    echo '<h1>' . $user->name . '</h1>
        <p><b>Email:</b> ' . $user->email . '</p>';
}


$sql = 'SELECT * FROM `users` WHERE `id` = :id';
$query = $pdo->prepare($sql);
$query->execute(['id'=>$id]);

$users = $query->fetch(PDO::FETCH_OBJ);

echo $users->name;

//Добавление данных в Базу

//$login ='codi999';
//$email = 'test543@gmail.com';
//$name = 'Влад';
//$surname = 'Петров';
//
//$sql = 'INSERT INTO users(login, email, name, surmame) VALUES(:login, :email, :name, :surmame)';
//
//$query = $pdo->prepare($sql);
//$query->execute(['login'=>$login, 'email'=>$email, 'name'=>$name, 'surmame'=>$surname]);


// Обновление конкретного поля в таблице

//$id = 4;
//$login = "New Login2";
//$sql = 'UPDATE `users` SET `login` = :login WHERE `id` = :id';
//
//$query = $pdo->prepare($sql);
//$query->execute(['login'=>$login, 'id' => $id]);

//Удаление записей из БД

$id = 3;
$sql = 'DELETE FROM `users` WHERE `id` = ?';

$query = $pdo->prepare($sql);
$query->execute([$id]);

?>
</body>
</html>