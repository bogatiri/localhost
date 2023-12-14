<?php
$email = filter_var(trim($_POST['email-log']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password-log']), FILTER_SANITIZE_STRING);

echo '<script>alert("' . $name . '");</script>';

$pass = md5($pass . "jhsdafjksdf1321");

require "connect.php";

$stmt = $mysql->prepare("SELECT * FROM `users` WHERE `email` = ? AND `pass` = ?");
$stmt->bind_param('ss', $email, $pass);
$stmt->execute();

if ($stmt === false) {
    die('Ошибка подготовки запроса: ' . $mysql->errno . ' - ' . $mysql->error);
}

$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$mysql->close();

if (empty($user)) {
    echo "Пользователь не найден";
    exit();
}

setcookie('user', $user['email'], time() + 3600, "/");
session_start();
$_SESSION['user_name'] = $user['surname'] . ' ' . $user['name'] ;
$_SESSION['user_qualification'] = $user['qualification'];
$_SESSION['email'] = $user['email'];

if (isset($user['theme'])) {
    $_SESSION['theme'] = $user['theme'];
}
header('Location: main.php');
?>