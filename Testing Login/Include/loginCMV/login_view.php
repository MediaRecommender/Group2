<?php

declare(strict_types=1);

function output_uname(){
    if(isset($_SESSION["user_id"])){
        echo "You are logged in as " . $_SESSION["user_uname"];
    }
}

function check_login_errors(){
    if(isset($_SESSION["errorsLogin"])){
        $errors = $_SESSION["errorsLogin"];

        echo "<br>";

        foreach($errors as $error){
            echo '<p class="form-error">'.$error.'</p>';
        }

        unset($_SESSION["errorsLogin"]);
    }
}
