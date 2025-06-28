<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "hostel_system";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
$step = isset($_POST['step']) ? intval($_POST['step']) : 1;
$data = isset($_POST['data']) ? $_POST['data'] : '{}';

if (!$user_id) {
    http_response_code(400);
    echo "Missing user_id";
    exit;
}

// Check if a draft exists for this user
$stmt = $conn->prepare("SELECT id FROM hostel_registration_drafts WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    // Update existing draft
    $stmt->close();
    $stmt = $conn->prepare("UPDATE hostel_registration_drafts SET data = ?, step = ?, last_updated = NOW() WHERE user_id = ?");
    $stmt->bind_param("sii", $data, $step, $user_id);
    $stmt->execute();
    echo "Draft updated";
} else {
    // Insert new draft
    $stmt->close();
    $stmt = $conn->prepare("INSERT INTO hostel_registration_drafts (user_id, data, step, last_updated) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("isi", $user_id, $data, $step);
    $stmt->execute();
    echo "Draft saved";
}
$stmt->close();
$conn->close(); 