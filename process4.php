<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);

    $email = htmlspecialchars($email);

    $errors = [];

    if (empty($email)) {
        $errors[] = "Электронная почта обязательна";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "У электронной почты некорректный формат";
    }
    
    if (empty($errors)) {
        $email = htmlspecialchars($email);

        print("<h1>Данные обработаны</h1>");
        print("Почта: {$email}<br>");
        
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}