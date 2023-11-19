<?php

declare(strict_types=1);

function isInputEmpty(string $uname, string $psw){
    return empty($psw) ||empty($uname);
}

function isUsernameWrong(bool|array $result){ 
    if(!$result)
        return true;
    else
        return false;
}

function isPasswordWrong(string $psw, string $hashedPsw){ 
    return !password_verify($psw, $hashedPsw);
}