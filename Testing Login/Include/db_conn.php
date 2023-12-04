<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$dsn = "mysql:host=musicrecommender-db.cwyhyfiwavvc.us-west-1.rds.amazonaws.com:3306;
        dbname=musicrecommender";
$dbusername = "admin";
$dbpassword = "password";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed". $e->getMessage();
}