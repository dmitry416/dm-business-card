<?php
require_once('db.php');

if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (!$login || !$email || !$pass) {
        die("Пожалуйста, введите все значения!");
    }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$login', '$email', '$pass')";

    if (!$link->exec($sql)) {
        echo "Не удалось добавить пользователя";
    } else {
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Можаров Дмитрий</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-box p-4 rounded">
            <h1 class="mb-4 text-center">registration</h1>
            <form action="/registration.php" method="POST" class="d-flex flex-column gap-3">
                <input type="text" name="login" class="form-control hacker-input" placeholder="login">
                <input type="email" name="email" class="form-control hacker-input" placeholder="email">
                <input type="password" name="password" class="form-control hacker-input" placeholder="password">
                <button class="btn btn-primary" type="submit" name="submit">Register</button>
                <p class="mt-3 text-center">Already have an account? <a href="/login.php">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
