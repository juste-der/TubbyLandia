<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;
use GuzzleHttp\Client;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../config");
$dotenv->load();

if (isset($_ENV['API_KEY']) && !empty($_ENV['API_KEY'])) {
    $apiKey = $_ENV['API_KEY'];
} else {
    die("Fatal Error: API_KEY is missing. Please check your configuration in the .env file.");
}

$client = new Client(
    [
        'url' => 'https://www.yrgopelago.se/centralbank',
        'timeout' => 5.0,
    ]
);

function getBank(Client $client): string
{
    $response = $client->get('/');
    echo $response;
    return $response->getBody()->getContents();
}

function getIslands(Client $client): array
{
    $response = $client->get('/island');
    return json_decode($response->getBody()->getContents(), true);
}
function submitIslands(Client $client, array $data): array
{
    $response = $client->post('/islands', ['json' => $data]);
    return json_decode($response->getBody()->getContents(), true);
}
// function getAPI??
