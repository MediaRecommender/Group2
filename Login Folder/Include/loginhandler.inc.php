<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];
    loginMethod($uname,$psw);
}
else {
    header("Location: ../index.php");
}

function loginMethod($uname,$psw){
    //$rmb = $_POST["rmb"];
    try{
        require "db_conn.php";
        require_once "loginCMV/login_model.php";
        require_once "loginCMV/login_contr.php";

        // ERROR HANDLERS
        $errors = [];


        if(isLoginInputEmpty($uname, $psw)) {
            $errors["emptyInput"] = "Fill in all fields!";
        }

        $result = get_uname_info($pdo, $uname);

        if(isUsernameWrong($result) || isPasswordWrong($psw, $result["password"])) {
            $errors["invalidInfo"] = "Username or password incorrect!";
        }

        require_once 'config.php';

        if($errors){
            $_SESSION["errorsLogin"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $result["name"];
        session_id($sessionID);

        $_SESSION["user_id"] = $result["username"];
        $_SESSION["user_uname"] = htmlspecialchars($result["name"]);


        $_SESSION['last_regeneration'] = time(); 
        
        header("Location: ../index.php?login=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
