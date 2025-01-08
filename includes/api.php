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
        'base_uri' => 'https://www.yrgopelago.se/centralbank/',
        'timeout' => 5.0,
    ]
);


function getBank(Client $client): string
{
    $response = $client->get('/');
    return $response->getBody()->getContents();
}

function getIslands(Client $client): array
{
    $response = $client->get('islands');
    return json_decode($response->getBody()->getContents(), true);
}
function submitIslands(Client $client, array $data): array
{
    $response = $client->post('islands', [
        'headers' => [
            'Authorization' => 'Manager ' . $_ENV['API_KEY'],
            'Accept' => 'application/json',
        ],
        'json' => [
            'islandName' => $data['islandName'],
            'hotelName' => $data['hotelName'],
            'url' => $data['url'],
            'stars' => $data['stars'],
            'owner' => $data['owner'],
            'api_key' => $_ENV['API_KEY'],
        ],
    ]);

    return json_decode($response->getBody()->getContents(), true) ?? [
        'success' => true,
        'message' => 'Island submitted successfully, but no response was returned.',
    ];
}

function checkTransferCode(Client $client, string $transferCode, int $totalCost): array
{
    $response = $client->post(
        'transferCode',
        [
            'form_params' => [
                'transferCode' => $transferCode,
                'totalcost' => $totalCost,
            ],
        ]
    );

    $rawResponse = $response->getBody()->getContents();
    error_log("Central Bank Response: " . $rawResponse);

    $decodedResponse = json_decode($rawResponse, true);

    if (isset($decodedResponse['status'])) {
        $decodedResponse['valid'] = $decodedResponse['status'] === 'success';
    }

    return $decodedResponse;
}
function withdraw(Client $client, string $username, string $apiKey, int $amount): array
{
    $response = $client->post(
        'withdraw',
        [
            'form_params' => [
                'user' => $username,
                'api_key' => $apiKey,
                'amount' => $amount,
            ]
        ]
    );
    return json_decode($response->getBody()->getContents(), true);
}
function deposit(Client $client, string $username, string $transferCode, int $numberOfDays): array
{
    $response = $client->post(
        'deposit',
        [
            'form_params' => [
                'user' => $username,
                'transferCode' => $transferCode,
                'numberOfDays' => $numberOfDays,
            ]
        ]
    );

    return json_decode($response->getBody()->getContents(), true);
}
