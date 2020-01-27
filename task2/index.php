<?php
session_start();
setcookie('email', $_POST['email'], time() - 3600);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
<form action="action.php" method="post">
    <label for="name">Имя</label>
    <input id="name" type="text" name="name"/><br>
    <label for="email">Email</label>
    <input id="email" type="text" name="email"><br>
    <button type="submit">Отправить</button>
</form>

<h3>Сессии и Куки </h3>

<?php
/* Сессии и Куки*/
if ($_SESSION['name'] != "" || $_SESSION['email'] != "") {
    echo 'Сессия' . '<br>';
    echo 'Имя пользователя: ' . $_SESSION['name'] . '<br>';
    echo 'Email пользователя: ' . $_SESSION['email'] . '<br>';
}

if ($_COOKIE['name'] != "" || $_COOKIE['email'] != "") {
    echo 'Куки' . '<br>';
    echo 'Имя пользователя: ' . $_COOKIE['name'] . '<br>';
    echo 'Email пользователя: ' . $_COOKIE['email'] . '<br>';
}
?>

<h3>Работа с датой </h3>

<?php /*Работа с датой*/

/*Метод date() и time()*/
date_default_timezone_set('Europe/Moscow');
$date = date('Время: H:i:s') . '<br>';
echo $date;

/* Класс DateTime*/
$date_now = new DateTime();
$date_now->modify('+3 hour');
echo $date_now->format('Время: H:i:s');
echo '<br>';

echo $_SERVER['PHP_SELF'];
echo '<br>';
?>

<h3>ООП в PHP </h3>

<?php
/*ООП в PHP*/

class User
{
    const PASS = "password";

    public $name;
    private $surname = "None";
    private $email;
    private $login;
    private $pass;

    function __construct($name, $surname, $login)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->login = $login;
        $this->showAll('Пользователь: ');

        echo self::PASS . '<br>'; // вывод константы в самом классе
    }

    function showAll($text = '')
    {

        echo $text . $this->name . ', ' . $this->surname . '<br>';
    }

    function getSurname()
    {
        return $this->surname;
    }

//    function __destruct()
//    {
//        // TODO: Implement __destruct() method.
//        print 'Уничтожается '. __CLASS__ . '<br>';
//    }
}

$admin = new User('John', 'Marley', 'Admin');

echo '<br>';
echo User::PASS; // вывод константы из класса
echo '<br>';

$redactor = new User('Bob', 'Ivanov', 'Redactor');

//echo $redactor->$name;
?>

<h3>Наследование: </h3>

<?php

/* Наследование*/

class Car
{
    protected $speed;
    protected $wheels;
    protected $color;

    function __construct($speed, $color)
    {
        $this->speed = $speed;
        $this->color = $color;
    }

    function showSpeed()
    {
        echo 'Скорость автомобиля: ' . $this->speed . '<br>';
    }
}

class BMW extends Car
{
    private $model;

    function __construct($speed, $color, $model)
    {
        parent::__construct($speed, $color);
        $this->model = $model;
    }

    function setModel()
    {
        echo 'Модель автомобиля: ' . $this->model . '<br>';
        echo 'Цвет автомобиля: ' . $this->color . '<br>';

    }

}

class Audi extends BMW
{
}

$m3 = new BMW(340, 'White', 'M3');
$m3->showSpeed();
$m3->setModel();

echo '<br>';

$a4 = new Audi(250, 'blue', 'A4');
$a4->showSpeed();
$a4->setModel();

?>

<h3>Интерфейсы</h3>

<?php

interface Human
{
    public function talk();

    public function walk();
}

interface Mutant
{
    public function fly();
}

class Person implements Human, Mutant
{
    function talk()
    {
        echo 'Человек говорит<br>';
    }

    function walk()
    {
        echo 'Человек ходит<br>';
    }

    public function fly()
    {
        echo 'Мутант умеет летать<br>';
    }
}

$bob = new Person();
$bob->talk();
$bob->walk();
$bob->fly();
?>
<h3>Трейты</h3>

<?php
// трейты помогают исп. код повторно

trait PrintSome
{
    public function talk()
    {
        echo 'Привет мир!' . '<br>';
    }

    public function sayBye()
    {
        echo 'Пока всем' . '<br>';
    }
}

trait Testing
{
    public function some()
    {
        echo 'Работа с тестовой функцией' . '<br>';
    }
}

class Test
{

    use PrintSome, Testing;

}

$obj = new Test();
$obj->talk();
$obj->sayBye();
$obj->some();


?>

<h3>Абстрактные классы</h3>

<?php
/* Абстрактные классы - от них нельзя создать объект, реализация методов происходит в классах наследниках*/

abstract class Cars
{
    protected $speed;
    protected $color;

    abstract protected function showInfo();
}

class VAZ extends Cars
{
    function __construct($speed)
    {
        $this->speed = $speed;
    }

    public function showInfo()
    {
        echo 'Скорость автомобиля: ' . $this->speed . ' км/ч <br>';
    }
}

$vesta = new VAZ(180);
$vesta->showInfo();
?>

<h3>CURL</h3>

<?php
/*CURL - технология, кторая помогает взаимодействовать с различными серверами*/

$curl = curl_init(); // запуск
//curl_setopt($curl, CURLOPT_URL, 'https://itproger.com'); //настройки
//curl_setopt($curl,CURLOPT_RETURNTRANSFER, true );

$result = curl_exec($curl); //выполнили

$params = array('name'=>'cookie_set');

 //завершили

$section = explode('<section class="courses-section container">', $result);
$section_2 = explode('</section>', $section[1]);
print_r($section_2[0]);


curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://itproger-php/task2/cookie.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS =>http_build_query($params)
));

$result = curl_exec($curl);
curl_close($curl);
echo $_COOKIE['myCookie'];
?>

</body>
</html>