<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel-management-system";

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!$data || !isset($data['facilities']) || !is_array($data['facilities']) || count($data['facilities']) === 0) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "No facilities selected"]);
    exit();
}

// Convert facilities array to a comma-separated string
$facility_list = implode(',', $data['facilities']);

// If you have a hostel_id, get it from $data['hostel_id']
// $hostel_id = $data['hostel_id'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Insert all facilities as a single row
$stmt = $conn->prepare("INSERT INTO room (facility) VALUES (?)");
$stmt->bind_param("s", $facility_list);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to save facilities"]);
}

$stmt->close();
$conn->close();
?>