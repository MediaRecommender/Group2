<?php

declare(strict_types=1);

function get_uname_info(object $pdo, string $name) {
    $query = "SELECT * FROM users WHERE name = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

