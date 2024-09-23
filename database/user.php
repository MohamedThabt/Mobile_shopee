<?php

// dtabase PDO open connection


try {
    $dsn = "mysql:host=localhost;dbname=mobile_store;charset=utf8mb4";
    $pdo = new PDO($dsn, 'root', '');

    // Enable exceptions for errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}