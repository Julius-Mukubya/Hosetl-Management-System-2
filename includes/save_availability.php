<?php
ob_clean();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel-management-system";

// Get JSON input from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (
    !$data ||
    empty($data['acceptingbookings']) ||
    empty($data['availableFrom'])
) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Missing or invalid fields"]);
    exit();
}

$acceptingbookings = $data['acceptingbookings'];
$availableFrom = $data['availableFrom'];

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Insert into availability table (make sure this table exists)
$stmt = $conn->prepare("INSERT INTO room (availability, available_date) VALUES (?, ?)");
$stmt->bind_param("ss", $acceptingbookings, $availableFrom);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to save availability status"]);
}

$stmt->close();
$conn->close();
?>