<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$dsn = "mysql:host=test-user-database.cebuue64dnw6.us-east-2.rds.amazonaws.com:3306;
        dbname=TestUserDB";
$dbusername = "admin";
$dbpassword = "helloWorld1234";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed". $e->getMessage();
}