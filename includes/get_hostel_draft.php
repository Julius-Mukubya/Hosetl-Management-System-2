<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "hostel_system";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$user_id = isset($_REQUEST['user_id']) ? intval($_REQUEST['user_id']) : 0;
if (!$user_id) {
    http_response_code(400);
    echo json_encode(["error" => "Missing user_id"]);
    exit;
}

$stmt = $conn->prepare("SELECT data, step, last_updated FROM hostel_registration_drafts WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($data, $step, $last_updated);
if ($stmt->fetch()) {
    echo json_encode([
        "data" => json_decode($data, true),
        "step" => $step,
        "last_updated" => $last_updated
    ]);
} else {
    http_response_code(404);
    echo json_encode(["error" => "No draft found"]);
}
$stmt->close();
$conn->close(); 