<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];

    try{
        require_once "db_conn.php";

        $query = "INSERT INTO users (uname, psw) 
        
        VALUES (:uname, :psw);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":uname", $uname);
        $stmt->bindParam(":psw", $psw);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location:index.php");

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


} else{
    header("Location: ../index.php");
}