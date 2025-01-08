<?php
require __DIR__ . '/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $roomId = $data['room_id'];
    $arrivalDate = $data['arrival_date'];
    $departureDate = $data['departure_date'];

    $stmt = $pdo->prepare("
    SELECT COUNT(*) as count 
    FROM Bookings 
    WHERE room_id = :room_id 
    AND (arrival_date < :departure_date AND departure_date > :arrival_date)
");
    $stmt->execute([
        ':room_id' => $roomId,
        ':arrival_date' => $arrivalDate,
        ':departure_date' => $departureDate,
    ]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(['available' => $result['count'] == 0]);
    exit;
}
