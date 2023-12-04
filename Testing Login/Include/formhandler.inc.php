<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];

    try{
        require_once "db_conn.php";
        require_once "signupCMV/signup_model.php";
        require_once "signupCMV/signup_contr.php";

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

        require_once 'config.php';

        if($errors){
            $_SESSION["errorsSignup"] = $errors;
            header("Location: ..\create.php");
            die();
        }

        $query = "INSERT INTO users (name, password, username) 
        
        VALUES (:uname, :psw, :email);";

        $stmt = $pdo->prepare($query);

        $options = [
            "cost"=> 12
        ];
        
        $hashedPassword = password_hash($psw, PASSWORD_BCRYPT, $options);
        $psw = $hashedPassword;

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
    header("Location: ../create.php");
}