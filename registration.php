<?php
// Получаем все данные из POST массива
// и помещаем все данные в переменные
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fav_cars = $_POST['fav_cars'];
$fav_films = $_POST['fav_films'];

// Разделяем строку с данными про все любимые фильмы пользователя
// Разделяем по символу - F,
// В результате разделения строки мы получим массив из нескольких элементов
$arr_films = explode(",", $fav_films);

// Проверка на верные данные
if(strlen($name) < 3) // Если количество символов в строке менее 5, то ошибка
    $error = "Имя не менее 3 символов";
else if(strlen($email) < 5)
    $error = "Email не менее 5 символов";
else if(strlen($phone) < 10)
    $error = "Телефон не менее 10 символов";
else if(count($fav_cars) == 0) // Если было выбрано 0 любимых машин - ошибка
    $error = "Вы не выбрали ни одного любимого автомобиля";
else if(count($arr_films) <= 1) // Если в массиве 1 или менее элементов - ошибка
    $error = "Необходимо написать не менее 2 любимых фильмов";

// Если переменная не пустая, то есть ошибка и мы её выводим
if($error != '') {
    echo $error;
    exit(); // Также останавливаем программу, чтобы дальше не выполнялась
}

// Помещаем все в массив
$data = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'fav_cars' => $fav_cars,
    'fav_films' => $arr_films // Именно $arr_films, так как в этой переменной у нас массив
];

echo "<h1>Вся информация</h1>";
foreach($data as $key => $value) {
    // fav_cars и fav_films это массивы, поэтому
    // мы проверяем работаем ли мы сейчас с этими элементами.
    // Если работаем, то их выводим не через echo, а через еще один цикл
    if($key == 'fav_cars' || $key == 'fav_films') {
        echo "<b>".$key.":</b><ul>"; // Открываем список <ul>

        foreach($value as $el) {
            echo "<li>".$el."</li>";
        }

        echo "</ul><br>"; // закрываем список <ul>
    } else // Все остальное просто выводим на экран
        echo $value.'<br>';
}
?>