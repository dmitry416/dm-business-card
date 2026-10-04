<?php
require_once('db.php');
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
        <div class="login-box p-5 rounded text-center">
            <h1 class="mb-5" style="font-size: 3rem;">Login In!</h1>

            <?php
            if (!isset($_COOKIE['User'])) {
            ?>
            <div class="d-flex justify-content-center gap-4">
                <a href="/registration.php" class="btn btn-primary fs-5 text-decoration-underline">Registration</a>
                <a href="/login.php" class="btn btn-primary fs-5 text-decoration-underline">Login</a>
            </div>
            <?php
            } else {
                $sql = "SELECT * FROM posts";
                $res = $link->query($sql);

                $found = false;
                while ($post = $res->fetchArray(SQLITE3_ASSOC)) {
                    $found = true;
                    echo "<a href='/posts.php?id=" . $post["id"] . "' class='d-block mb-2' style='color:#3f3;'>" . $post["title"] . "</a>";
                }
                if (!$found) {
                    echo "<p style='color:#3f3;'>Записей пока нет</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
