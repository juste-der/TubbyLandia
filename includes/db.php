<?php
try {
    $pdo = new PDO('sqlite:' . __DIR__ . '/tubbylandia.sqlite3');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
