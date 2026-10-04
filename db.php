<?php
$dbFile = __DIR__ . '/hack_site.sqlite';
$isNew = !file_exists($dbFile);
$link = new SQLite3($dbFile);

if ($isNew) {
    $link->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username VARCHAR(15) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(20) NOT NULL
    )");

    $link->exec("CREATE TABLE IF NOT EXISTS posts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL
    )");
}
