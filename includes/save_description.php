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

// Validate required fields
if (
    !$data ||
    empty($data['overview']) ||
    empty($data['hostelRules']) ||
    empty($data['checkInTime']) ||
    empty($data['checkOutTime']) ||
    empty($data['securityFeatures'])
) {
    http_response_code(400); // Bad Request
    echo json_encode(["success" => false, "message" => "All fields are required"]);
    exit();
}

// Assign variables from the received data
$overview = $data['overview'];
$hostelRules = $data['hostelRules'];
$checkInTime = $data['checkInTime'];
$checkOutTime = $data['checkOutTime'];
$securityFeatures = $data['securityFeatures'];

// Connect to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for a connection error
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Prepare an SQL statement to insert the description data
$stmt = $conn->prepare("INSERT INTO description (over_view,rules, check_in_time, check_out_time, security_features) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $overview, $hostelRules, $checkInTime, $checkOutTime, $securityFeatures);

// Execute the statement and return a JSON response
if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to save description"]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>