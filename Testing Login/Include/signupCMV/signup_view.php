<?php

declare(strict_types=1);

function check_signup_errors() {
    if(isset($_SESSION["errorsSignup"])){
        $errors = $_SESSION["errorsSignup"];

        echo "<br>";

        foreach($errors as $error){
            echo '<p class="form-error">'.$error.'</p>';
        }

        unset($_SESSION["errorsSignup"]);
    }
}