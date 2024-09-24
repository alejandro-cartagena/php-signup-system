<?php

$host = "localhost";
$dbname = "my_first_db";
$dsn = "mysql:host=$host;dbname=$dbname;";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection to DB Failed: " . $e->getMessage();
}