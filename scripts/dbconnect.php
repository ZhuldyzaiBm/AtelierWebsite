<?php
    // Указываем кодировку
    header('Content-Type: text/html; charset=utf-8');

    $server = "localhost"; /* имя хоста (уточняется у провайдера), если работаем на локальном сервере, то указываем localhost */
    $username = "mysql"; /* Имя пользователя БД */
    $password = "mysql"; /* Пароль пользователя, если у пользователя нет пароля то, оставляем пустым */
    $database = "atelier"; /* Имя базы данных, которую создали */
    $connect = new PDO("mysql:host=localhost;dbname=atelier", $username, $password);
    // Подключение к базе данный через MySQLi
$con = mysqli_connect($server,$username,$password,$database);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
        }

    $mysqli = new mysqli($server, $username, $password, $database);
    
    // Проверяем, успешность соединения. 
    if (mysqli_connect_errno()) { 
        echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
        exit(); 
    }
 
    // Устанавливаем кодировку подключения
    $mysqli->set_charset('utf8');
    

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
    //Для удобства, добавим здесь переменную, которая будет содержать название нашего сайта
    //$address_site = "http://testing";
?>