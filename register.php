<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $name = filter_var(trim($_POST['name-reg']),
    FILTER_SANITIZE_STRING);
    $surname = filter_var(trim($_POST['surname']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email-reg']), 
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password-reg']),
    FILTER_SANITIZE_STRING);
    $organization = filter_var(trim($_POST['organization-reg']),
    FILTER_SANITIZE_STRING);
    $qualification = filter_var(trim($_POST['qualification']),
    FILTER_SANITIZE_STRING);

    echo $name;
    if(mb_strlen($name) < 2 || mb_strlen($name) > 90){
        echo "Недопустимая длина Имени";
        exit();
    } else if (mb_strlen($surname) < 3 || mb_strlen($surname) > 50){
        echo "Недопустимая длина Фамилии";
        exit();
    } else if (mb_strlen($email) < 3 || mb_strlen($email) > 50){
        echo "Недопустимая длина email";
        exit();
   } else if (mb_strlen($pass) < 3 || mb_strlen($pass) > 50){
        echo "Недопустимая длина пароля (не менее 3 символов)";
        exit();
    } else if (mb_strlen($organization) < 1 || mb_strlen($organization) > 50){
        echo "Недопустимая длина значения (не менее 3 символов)";
        exit();
    } else if (mb_strlen($qualification) < 3 || mb_strlen($qualification) > 50){
        echo "Недопустимая длина значения (не менее 3 символов)";
        exit();
    }

    $pass = md5($pass."jhsdafjksdf1321");

    require "connect.php";

    $mysql->query("INSERT INTO `users` (`name`,`surname`, `email`, `pass`, `organization`, `qualification`)
    VALUES('$name','$surname', '$email', '$pass','$organization', '$qualification')");
/*     echo '<script>alert("' . $name . '");</script>';
    echo $name; */
    $mysql->close();

    header('Location: login.php');
?>