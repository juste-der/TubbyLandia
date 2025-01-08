<?php


require __DIR__ . '/db.php';
require __DIR__ . '/api.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

// Extract data from the request
$roomId = $data['room_id'];
$arrivalDate = $data['arrival_date'];
$departureDate = $data['departure_date'];
$transferCode = $data['transfer_code'];
$totalCost = $data['total_cost'];
$features = $data['features'];
$numberOfDays = $data['number_of_days'];


try {
    // Step 1: Validate the transfer code with the central bank
    $response = checkTransferCode($client, $transferCode, $totalCost);

    if (!isset($response['valid']) || !$response['valid']) {
        echo json_encode([
            'success' => false,
            'message' => isset($response['status']) && $response['status'] !== 'success'
                ? 'Invalid transfer code.'
                : 'Unexpected response from central bank.'
        ]);
        exit;
    }

    // Step 2: Insert the booking into the database
    $stmt = $pdo->prepare("
        INSERT INTO Bookings (room_id, arrival_date, departure_date, total_cost, additional_info)
        VALUES (:room_id, :arrival_date, :departure_date, :total_cost, :additional_info)
    ");
    $stmt->execute([
        ':room_id' => $roomId,
        ':arrival_date' => $arrivalDate,
        ':departure_date' => $departureDate,
        ':total_cost' => $totalCost,
        ':additional_info' => json_encode($features),
    ]);

    // Step 3: Make the deposit to your central bank account
    $depositResponse = deposit($client, $_ENV['YOUR_USERNAME'], $transferCode, $numberOfDays);

    if (!isset($depositResponse['status']) || $depositResponse['status'] !== 'success') {
        echo json_encode(['success' => false, 'message' => 'Deposit failed: ' . ($depositResponse['message'] ?? 'Unknown error')]);
        exit;
    }

    // If everything is successful
    echo json_encode([
        'success' => true,
        'message' => 'Booking successful and payment received.'
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}




// require __DIR__ . '/db.php';
// require __DIR__ . '/api.php';

// header('Content-Type: application/json');

// $data = json_decode(file_get_contents('php://input'), true);

// $roomId = $data['room_id'];
// $arrivalDate = $data['arrival_date'];
// $departureDate = $data['departure_date'];
// $transferCode = $data['transfer_code'];
// $totalCost = $data['total_cost'];
// $features = $data['features'];
// $numberOfDays = $data['number_of_days'];

// try {
//     $response = checkTransferCode($client, $transferCode, $totalCost);
//     if (!$response['valid']) {
//         echo json_encode(['success' => false, 'message' => 'Invalid ransfer code.']);
//         exit;
//     }
//     $stmt = $pdo->prepare("
//     INSERT INTO Bookings (room_id, arrival_date, departure_date, total_cost, additional_info)
//     VALUES (:room_id, :arrival_date, :departure_date, :total_cost, :additional_info)
// ");
//     $stmt->execute([
//         ':room_id' => $roomId,
//         ':arrival_date' => $arrivalDate,
//         ':departure_date' => $departureDate,
//         ':total_cost' => $totalCost,
//         ':additional_info' => json_encode($features),
//     ]);

//     $depositResponse = deposit($client, $_ENV['YOUR_USERNAME'], $transferCode, $numberOfDays);

//     if ($depositResponse['status'] !== 'success') {
//         echo json_encode(['success' => false, 'message' => 'Deposit failed: ' . $depositResponse['message']]);
//         exit;
//     }
//     echo json_encode(['success' => true, 'message' => 'Booking successful and payment received.']);
// } catch (Exception $e) {
//     echo json_encode(['success' => false, 'message' => $e->getMessage()]);
// } 