<?php

declare(strict_types=1);

function get_uname_info(object $pdo, string $uname) {
    $query = "SELECT * FROM users WHERE uname = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $uname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}