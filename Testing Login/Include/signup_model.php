<?php

declare(strict_types=1);



function get_username(object $pdo, string $uname) {
    $query = "SELECT uname FROM users WHERE uname = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $uname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}