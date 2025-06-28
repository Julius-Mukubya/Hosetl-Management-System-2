<?php
header('Content-Type: application/json');
if (!isset($_GET['id'])) {
    echo json_encode(['success' => false, 'message' => 'No ID']);
    exit;
}
$host = "localhost";
$user = "root";
$pass = "";
$db = "hostel_system";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'DB error']);
    exit;
}
$id = intval($_GET['id']);
$sql = "SELECT name, hostel_type_id, owner_name, address,city,landmarks,overview,hostel_rules,check_in_time,check_out_time,security_features,
distance_from_campus,directions,contact_number, email FROM hostels WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    echo json_encode(['success' => true, 'hostel' => $row]);
} else {
    echo json_encode(['success' => false, 'message' => 'Not found']);
}
$conn->close();
?>