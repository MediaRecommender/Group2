<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];
    $email = $_POST["email"];

    try{
        require_once "db_conn.php";
        require_once "signup_model.php";
        require_once "signup_contr.php";

        // ERROR HANDLERS
        $errors = [];


        if(isInputEmpty($uname, $psw, $email)) {
            $errors["emptyInput"] = "Fill in all fields!";
        }
        if(isEmailInvalid($email)) {
            $errors["invalidEmail"] = "Invalid email used!";
        }
        if(isUsernameTaken($pdo, $uname)){
            $errors["usernameTaken"] = "Username already in use!";
        }
        if(isEmailRegistered($pdo, $email)) {
            $errors["emailRegistered"] = "Email already registered!";
        }

        session_start(); //WATCH SESSION SECURITY EPISODE TUTORIAL

        if($errors){
            $_SESSION["errorsSignup"] = $errors;
            header("Location: ..\index.php");
        }

        $query = "INSERT INTO users (uname, psw, email) 
        
        VALUES (:uname, :psw, :email);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":uname", $uname);
        $stmt->bindParam(":psw", $psw);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location:..\index.php");

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }


} else{
    header("Location: ../index.php");
}