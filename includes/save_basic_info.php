<?php
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel-management-system";

// Get JSON input and decode
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (
    !$data ||
    empty($data['hostelName']) ||
    empty($data['hostelType']) ||
    empty($data['ownerName']) ||
    empty($data['contactNumber']) ||
    empty($data['emailAddress'])
) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Missing required fields"]);
    exit();
}

// Assign variables
$hostelName = $data['hostelName'];
$hostelType = $data['hostelType'];
$ownerName = $data['ownerName'];
$contactNumber = $data['contactNumber'];
$emailAddress = $data['emailAddress'];

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Insert owner
$stmt = $conn->prepare("INSERT INTO owner (name, contact, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $ownerName, $contactNumber, $emailAddress);

if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to save owner"]);
    $stmt->close();
    $conn->close();
    exit();
}
$owner_id = $stmt->insert_id;
$stmt->close();

// Insert hostel with owner_id
$stmt2 = $conn->prepare("INSERT INTO hostel (name,type, owner_id) VALUES (?, ?, ?)");
$stmt2->bind_param("ssi", $hostelName, $hostelType, $owner_id);

if ($stmt2->execute()) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to save hostel"]);
}
$stmt2->close();
$conn->close();
?>