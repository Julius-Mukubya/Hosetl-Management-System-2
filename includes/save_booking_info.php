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

// Validate input (case-sensitive field names)
if (
    !$data ||
    empty($data['minBookingDuration']) ||
    empty($data['minBookingUnit']) ||
    empty($data['advancePayment']) ||
    empty($data['advancePaymentUnit']) ||
    empty($data['refundPolicy']) ||
    !isset($data['paymentMethods']) || !is_array($data['paymentMethods']) || count($data['paymentMethods']) === 0
) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Missing or invalid fields"]);
    exit();
}

// Assign variables
$minBookingDuration = $data['minBookingDuration'];
$minBookingUnit = $data['minBookingUnit'];
$advancePayment = $data['advancePayment'];
$advancePaymentUnit = $data['advancePaymentUnit'];
$refundPolicy = $data['refundPolicy'];
$paymentMethods = implode(',', $data['paymentMethods']); // Store as comma-separated string

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Insert into booking table
$stmt = $conn->prepare("INSERT INTO booking (min_booking_duration, min_booking_unit, advance_payment, advance_payment_unit, refund_policy, payment_methods) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isdsss", $minBookingDuration, $minBookingUnit, $advancePayment, $advancePaymentUnit, $refundPolicy, $paymentMethods);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to save booking info"]);
}

$stmt->close();
$conn->close();
?>
