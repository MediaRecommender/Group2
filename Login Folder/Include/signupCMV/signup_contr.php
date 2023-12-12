<?php

declare(strict_types=1);

function isInputEmpty(string $uname, string $psw, string $email){
    return empty($psw) || empty($email) ||empty($uname);
}

function isEmailInvalid(string $email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) === false;
}

function isUsernameTaken(object $pdo, string $uname) {
    return get_username($pdo, $uname);
}

function isEmailRegistered(object $pdo, string $email){
    return get_email($pdo, $email);
}