<?php
    $mysql = new mysqli('localhost', 'root', '', 'login-bd');
    if ($mysqli->connect_error) {
        die('Ошибка подключения к базе данных: ' . $mysqli->connect_error);
    }
?>