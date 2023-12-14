<?php
session_start();

require "connect.php";

$theme = isset($_POST['theme']) ? $_POST['theme'] : '';

try {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $updateQuery = "UPDATE users SET theme = ? WHERE email = ?";
        $stmt = $mysql->prepare($updateQuery);
        $stmt->bind_param('ss', $theme, $email);
        if ($stmt->execute()) {
            echo 'Тема успешно сохранена';
            echo $theme;
        } else {
            echo 'Ошибка при выполнении запроса: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        echo 'Пользователь не авторизован';
    }
}catch (Exception $e) {
        error_log('Exception caught: ' . $e->getMessage());
        echo 'Ошибка при сохранении темы. Подробности в логах сервера.';
}
$_SESSION['theme'] = $theme;
$mysql->close();
?>