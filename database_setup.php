<?php
// Database connection settings
$host = "localhost";
$user = "root";
$pass = "";
$db = "hostel_system";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

echo "Setting up initial database data...\n";

// Insert room types
$room_types = array(
    'Single Room',
    'Shared Room (2 beds)',
    'Shared Room (3 beds)',
    'Shared Room (4 beds)'
);

foreach ($room_types as $room_type) {
    $stmt = $conn->prepare("INSERT IGNORE INTO room_types (name) VALUES (?)");
    $stmt->bind_param("s", $room_type);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "Added room type: $room_type\n";
    }
    $stmt->close();
}

// Insert facilities
$facilities = array(
    'Wi-Fi',
    'Electricity Backup / Generator',
    'Laundry Services',
    'Meals'
);

foreach ($facilities as $facility) {
    $stmt = $conn->prepare("INSERT IGNORE INTO facilities (name) VALUES (?)");
    $stmt->bind_param("s", $facility);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "Added facility: $facility\n";
    }
    $stmt->close();
}

// Insert payment methods
$payment_methods = array(
    'Cash',
    'Mobile Money',
    'Bank Transfer',
    'Credit Card'
);

foreach ($payment_methods as $payment_method) {
    $stmt = $conn->prepare("INSERT IGNORE INTO payment_methods (name) VALUES (?)");
    $stmt->bind_param("s", $payment_method);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "Added payment method: $payment_method\n";
    }
    $stmt->close();
}

echo "Database setup completed!\n";
$conn->close();
?> 