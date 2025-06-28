<?php
// Enable error reporting for debugging during development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel-management-system";

// Get JSON input from the request body and decode it into an associative array
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!$data || !isset($data['rooms']) || !is_array($data['rooms']) || count($data['rooms']) === 0) {
    http_response_code(400); // Bad Request
    echo json_encode(["success" => false, "message" => "No room data received"]);
    exit();
}

// Connect to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for a connection error
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Prepare an SQL statement to insert room data
$stmt = $conn->prepare("INSERT INTO room (type,availability, price,furnishing) VALUES (?, ?, ?, ?)");

// Loop through each room and insert into the database
foreach ($data['rooms'] as $room) {
    // Validate required fields for each room
    if (
        empty($room['type']) ||
        !isset($room['availability']) ||
        !isset($room['price']) ||
        empty($room['furnishing'])
    ) {
        continue; // Skip invalid entries
    }

    $type = $room['type'];
    $pricing = $room['availability'];
    $availability = $room['price'];
    $furnishing = $room['furnishing'];

    $stmt->bind_param("sdis", $type, $pricing, $availability, $furnishing);
    $stmt->execute();
}

echo json_encode(["success" => true]);

// Close the statement and connection
$stmt->close();
$conn->close();
?>