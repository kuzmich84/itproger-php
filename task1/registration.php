<?php
    echo '<h1>Вся информация</h1>';
    if (!isset($_POST['submitted'])) {
        echo '<p>' . $_POST['name'] . '</p>';
        echo '<p>' . $_POST['email'] . '</p>';
        echo '<p>' . $_POST['phone'] . '</p>';

        echo '<b>fav_cars:</b>';
        echo '<ul>';
        foreach ($_POST['fav_cars'] as $item) {
            echo '<li>' . $item . '</li>';
        };
        echo '</ul>';

        $films = explode(",", $_POST['fav_films']);

        echo '<b>fav_films:</b>';
        echo '<ul>';
        foreach ($films as $item) {
            echo '<li>' . $item . '</li>';
        };
        echo '</ul>';
        echo $_POST['submit'];

    } else {
        echo 'Форма не была отправлениа';
    }