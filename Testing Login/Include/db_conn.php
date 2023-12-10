<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

    $dsn = "mysql:host=musicrecommender4800.cwyhyfiwavvc.us-west-1.rds.amazonaws.com:3306;
            dbname=musicrecommender4800";
    $dbusername = "hussain";
    $dbpassword = "beefbulgogi";
        try {
            $pdo = new PDO($dsn, $dbusername, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failed". $e->getMessage();
        }
