<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$host = "localhost";
$user = "root";
$pass = "";
$db = "hostel_system";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Helper function: Get the ID of a value in a table, or insert it if it doesn't exist
function getOrInsertId($conn, $table, $column, $value) {
    $id = null;
    $stmt = $conn->prepare("SELECT id FROM $table WHERE $column = ?");
    if (!$stmt) {
        throw new Exception("Failed to prepare statement for $table: " . $conn->error);
    }
    $stmt->bind_param("s", $value);
    $stmt->execute();
    $stmt->bind_result($id);
    if ($stmt->fetch()) {
        $stmt->close();
        return $id;
    }
    $stmt->close();
    $stmt = $conn->prepare("INSERT INTO $table ($column) VALUES (?)");
    if (!$stmt) {
        throw new Exception("Failed to prepare insert statement for $table: " . $conn->error);
    }
    $stmt->bind_param("s", $value);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    return $id;
}

try {
    // Validate required fields
    $required_fields = array('hostel_name', 'hostel_type', 'owner_name', 'contact_number', 'email', 'address', 'city');
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            throw new Exception("Required field '$field' is missing or empty");
        }
    }

    // Start transaction
    $conn->begin_transaction();

    // 1. Insert owner first
    $stmt = $conn->prepare("INSERT INTO owners (name, contact_number, email) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Failed to prepare owner insert: " . $conn->error);
    }
    $stmt->bind_param("sss", $_POST['owner_name'], $_POST['contact_number'], $_POST['email']);
    if (!$stmt->execute()) {
        throw new Exception("Failed to insert owner: " . $stmt->error);
    }
    $owner_id = $stmt->insert_id;
    $stmt->close();

    // 2. Insert the main hostel record
    $stmt = $conn->prepare("INSERT INTO hostels (name, type, owner_id, status) VALUES (?, ?, ?, 'Active')");
    if (!$stmt) {
        throw new Exception("Failed to prepare hostel insert: " . $conn->error);
    }
    $stmt->bind_param("ssi", $_POST['hostel_name'], $_POST['hostel_type'], $owner_id);
    if (!$stmt->execute()) {
        throw new Exception("Failed to insert hostel: " . $stmt->error);
    }
    $hostel_id = $stmt->insert_id;
    $stmt->close();

    // 3. Insert hostel location
    $stmt = $conn->prepare("INSERT INTO hostel_locations (hostel_id, full_address, city, landmarks, distance_from_campus, directions) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Failed to prepare location insert: " . $conn->error);
    }
    $landmarks = isset($_POST['landmarks']) ? $_POST['landmarks'] : '';
    $distance = isset($_POST['distance']) ? $_POST['distance'] : '';
    $directions = isset($_POST['directions']) ? $_POST['directions'] : '';
    $stmt->bind_param("isssss", $hostel_id, $_POST['address'], $_POST['city'], $landmarks, $distance, $directions);
    if (!$stmt->execute()) {
        throw new Exception("Failed to insert location: " . $stmt->error);
    }
    $stmt->close();

    // 4. Insert hostel description
    $stmt = $conn->prepare("INSERT INTO hostel_descriptions (hostel_id, overview, hostel_rules, check_in_time, check_out_time, security_features) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Failed to prepare description insert: " . $conn->error);
    }
    $overview = isset($_POST['overview']) ? $_POST['overview'] : '';
    $hostel_rules = isset($_POST['hostel_rules']) ? $_POST['hostel_rules'] : '';
    $check_in_time = isset($_POST['check_in_time']) ? $_POST['check_in_time'] : null;
    $check_out_time = isset($_POST['check_out_time']) ? $_POST['check_out_time'] : null;
    $security_features = isset($_POST['security_features']) ? $_POST['security_features'] : '';
    $stmt->bind_param("isssss", $hostel_id, $overview, $hostel_rules, $check_in_time, $check_out_time, $security_features);
    if (!$stmt->execute()) {
        throw new Exception("Failed to insert description: " . $stmt->error);
    }
    $stmt->close();

    // 5. Insert room types for the hostel
    if (isset($_POST['room_types']) && is_array($_POST['room_types'])) {
        foreach ($_POST['room_types'] as $index => $room_type_name) {
            // Get or create room type
            $room_type_id = getOrInsertId($conn, "room_types", "name", $room_type_name);
            
            // Get room details
            $price = isset($_POST['room_prices'][$index]) ? floatval($_POST['room_prices'][$index]) : 0;
            $availability = isset($_POST['room_availability'][$index]) ? intval($_POST['room_availability'][$index]) : 0;
            $furnishing = isset($_POST['room_furnishing'][$index]) ? $_POST['room_furnishing'][$index] : 'To be specified';
            
            // Insert hostel room with provided values
            $stmt = $conn->prepare("INSERT INTO hostel_rooms (hostel_id, room_type_id, price, availability_count, furnishing) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) {
                throw new Exception("Failed to prepare room insert: " . $conn->error);
            }
            $stmt->bind_param("iidss", $hostel_id, $room_type_id, $price, $availability, $furnishing);
            if (!$stmt->execute()) {
                throw new Exception("Failed to insert room: " . $stmt->error);
            }
            $stmt->close();
        }
    }

    // 6. Insert facilities for the hostel
    if (isset($_POST['facilities']) && is_array($_POST['facilities'])) {
        foreach ($_POST['facilities'] as $facility_name) {
            // Get or create facility
            $facility_id = getOrInsertId($conn, "facilities", "name", $facility_name);
            
            // Insert hostel facility
            $stmt = $conn->prepare("INSERT INTO hostel_facilities (hostel_id, facility_id) VALUES (?, ?)");
            if (!$stmt) {
                throw new Exception("Failed to prepare facility insert: " . $conn->error);
            }
            $stmt->bind_param("ii", $hostel_id, $facility_id);
            if (!$stmt->execute()) {
                throw new Exception("Failed to insert facility: " . $stmt->error);
            }
            $stmt->close();
        }
    }

    // 7. Handle photo uploads for the hostel
    $upload_dir = "../uploads/";
    if (!is_dir($upload_dir)) {
        if (!mkdir($upload_dir, 0777, true)) {
            throw new Exception("Failed to create upload directory");
        }
    }

    // 7a. Upload and save the front view photo
    if (isset($_FILES['front_view']) && $_FILES['front_view']['error'] == 0) {
        $front_name = uniqid() . "_" . basename($_FILES['front_view']['name']);
        $front_path = $upload_dir . $front_name;
        if (!move_uploaded_file($_FILES['front_view']['tmp_name'], $front_path)) {
            throw new Exception("Failed to upload front view photo");
        }
        
        $stmt = $conn->prepare("INSERT INTO hostel_photos (hostel_id, photo_type, file_name, file_path) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Failed to prepare photo insert: " . $conn->error);
        }
        $type = "Front View";
        $stmt->bind_param("isss", $hostel_id, $type, $front_name, $front_path);
        if (!$stmt->execute()) {
            throw new Exception("Failed to insert front view photo: " . $stmt->error);
        }
        $stmt->close();
    }

    // 7b. Upload and save room photos
    if (isset($_FILES['room_photos'])) {
        foreach ($_FILES['room_photos']['tmp_name'] as $i => $tmp_name) {
            if ($_FILES['room_photos']['error'][$i] == 0) {
                $room_name = uniqid() . "_" . basename($_FILES['room_photos']['name'][$i]);
                $room_path = $upload_dir . $room_name;
                if (!move_uploaded_file($tmp_name, $room_path)) {
                    throw new Exception("Failed to upload room photo");
                }
                
                $stmt = $conn->prepare("INSERT INTO hostel_photos (hostel_id, photo_type, file_name, file_path) VALUES (?, ?, ?, ?)");
                if (!$stmt) {
                    throw new Exception("Failed to prepare room photo insert: " . $conn->error);
                }
                $type = "Room";
                $stmt->bind_param("isss", $hostel_id, $type, $room_name, $room_path);
                if (!$stmt->execute()) {
                    throw new Exception("Failed to insert room photo: " . $stmt->error);
                }
                $stmt->close();
            }
        }
    }

    // 8. Set availability status
    $stmt = $conn->prepare("INSERT INTO availability_status (hostel_id, is_available) VALUES (?, TRUE)");
    if (!$stmt) {
        throw new Exception("Failed to prepare availability insert: " . $conn->error);
    }
    $stmt->bind_param("i", $hostel_id);
    if (!$stmt->execute()) {
        throw new Exception("Failed to insert availability status: " . $stmt->error);
    }
    $stmt->close();

    // Commit transaction
    $conn->commit();

    // Final output
    echo "Hostel added successfully!";

} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?> 