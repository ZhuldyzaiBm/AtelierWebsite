<?php

// Объявляем нужные константы
define('DB_HOST', 'localhost');
define('DB_USER', 'mysql');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'atelier');

// Подключаемся к базе данных
function connectDB() {
    $errorMessage = 'Невозможно подключиться к серверу базы данных';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn)
        throw new Exception($errorMessage);
    else {
        $query = $conn->query('set names utf8');
        if (!$query)
            throw new Exception($errorMessage);
        else
            return $conn;
    }
}