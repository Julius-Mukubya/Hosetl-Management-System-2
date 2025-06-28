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

// Validate required fields (Full Address and City are required)
if (
    !$data ||
    empty($data['fullAddress']) ||
    empty($data['city'])
) {
    http_response_code(400); // Bad Request
    echo json_encode(["success" => false, "message" => "Full Address and City are required"]);
    exit();
}

// Assign variables from the received data, using null for optional fields if not provided
$fullAddress = $data['fullAddress'];
$city = $data['city'];
$landmarks = $data['landmarks'] ?? null;
$distance = $data['distance'] ?? null;
$directions = $data['directions'] ?? null;

// Connect to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for a connection error
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Prepare an SQL statement to insert the location data
$stmt = $conn->prepare("INSERT INTO location (full_address, city, landmarks, distance, directions) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $fullAddress, $city, $landmarks, $distance, $directions);

// Execute the statement and return a JSON response
if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to save location"]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>