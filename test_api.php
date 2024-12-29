<?php

require __DIR__ . "/includes/api.php";

try {
    $response = getBank($client);
    echo "Response: " . htmlspecialchars($response);

    $islands = getIslands($client);
    echo "Response: " . print_r($islands, true);

    $islandData = [
        'islandName' => 'TubbyLandia',
        'hotelName' => 'Tubby Hotel',
        'url' => 'https://tubbylandia.com',
        'stars' => 4,
        'owner' => '16',
    ];

    $response = submitIslands($client, $islandData);
    echo "Response: <pre>" . print_r($response, true);

    $username = 'Rune';
    $amount = 10;
    $apikey = '0ae50412-18b8-4bd0-8818-8f0932c280b7';
    $response = withdraw($client, $username, $apikey, $amount);

    if (isset($response['transferCode'])) {
        echo 'Transfercode :' . $response['transferCode'];
    } else {
        echo "Error: " . print_r($response, true);
    }

    $transferCode = 'b474666f-787e-4249-a21b-55234a59174d';
    $totalCost = 10;
    $response = checkTransferCode($client, $transferCode, $totalCost);
    echo "<pre>" . print_r($response, true) . "</pre>";

    if (isset($response['status']) && $response['status'] === 'success') {
        echo "Transfer Code is valid!";
    } elseif (isset($response['status']) && $response['status'] !== 'success') {
        echo "Transfer Code is invalid.";
    } else {
        echo "Unexpected response: " . print_r($response, true);
    }

    $username = 'juste';
    $payer = 'rune';
    $transferCode = 'b474666f-787e-4249-a21b-55234a59174d';
    $numberOfDays = 2;

    $response = deposit($client, $username, $payer, $transferCode, $numberOfDays);

    echo "<pre>" . print_r($response, true) . "</pre>";

    if (isset($response['status']) && $response['status'] === 'success') {
        echo "<p>Deposit successful!</p>";
        echo "<p>Transfer Code: " . $response['transferCode'] . "</p>";
        echo "<p>Total Cost: " . $response['totalCost'] . "</p>";
    } elseif (isset($response['status']) && $response['status'] === 'error') {
        echo "<p>Deposit failed: " . (isset($response['message']) ? $response['message'] : "No message provided.") . "</p>";
    } else {
        echo "<p>Unexpected response structure:</p>";
        echo "<pre>" . print_r($response, true) . "</pre>";
    }
} catch (Exception $e) {
    echo "Error! ";
    echo $e->getMessage();
}
