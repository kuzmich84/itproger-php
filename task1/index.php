<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Форма регистрации</h2>
<form action="registration.php" method="post">
    <p><input type="text" name="name" minlength="3" required placeholder="John"/></p>
    <p><input type="email" name="email" minlength="5" required placeholder="example@some.ru"/></p>
    <p><input type="tel" name="phone" minlength="10"required pattern="[+]7[0-9]{10,}" placeholder="+78000000000"  /></p>
    <p>Выберите любимые автомобили</p>
    <p><select name="fav_cars[]" size="4" multiple="multiple" required>
            <option value="BMW">BMW</option>
            <option value="Mercedes">Mercedes</option>
            <option value="Audi">Audi</option>
            <option value="Volvo">Volvo</option>

        </select></p>
    <p>Введите любимые фильмы. Минимум 2 или <br> более. Вводить через запятую</p>
    <p><input name="fav_films" pattern="([0-9A-Za-zА-Яа-яЁё-\s]+)(,[0-9A-Za-zА-Яа-яЁё-\s]+){1,}" /></p>


    <button type="submit" name="submit">Отправить</button>


</form>
<?php



?>

</body>
</html>
