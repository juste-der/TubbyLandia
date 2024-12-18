<?php

declare(strict_types=1);

require __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/config");
$dotenv->load();
$apiKey = $_ENV['API_KEY'];
