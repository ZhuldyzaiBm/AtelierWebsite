<?php
    // Indicating the encoding
    header('Content-Type: text/html; charset=utf-8');

    $server = "localhost"; //hostname
    $username = "mysql"; //username
    $password = "mysql"; //password
    $database = "atelier"; //database name
    $connect = new PDO("mysql:host=localhost;dbname=atelier", $username, $password);

    // Connecting to the database through MySQLi
$con = mysqli_connect($server,$username,$password,$database);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
        }
    $mysqli = new mysqli($server, $username, $password, $database);
    // Checking if the connection was successful.
    if (mysqli_connect_errno()) { 
        echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
        exit(); 
    }
    // Setting the connection encoding
    $mysqli->set_charset('utf8');
    // Connecting to the database
function connectDB() {
    $errorMessage = 'Невозможно подключиться к серверу базы данных';
    $conn = new mysqli($server, $username, $password, $database);
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
     // Indicating address site
    $address_site = "http://atelier";
?>