<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel-management-system";

// Directory to save uploaded images
$uploadDir = "../uploads/"; // Points to root uploads folder

// Create uploads directory if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Helper function to handle file upload and return the saved path
function saveImage($fileInput, $uploadDir) {
    if (!isset($_FILES[$fileInput]) || $_FILES[$fileInput]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $fileTmp = $_FILES[$fileInput]['tmp_name'];
    $fileName = uniqid() . '_' . basename($_FILES[$fileInput]['name']);
    $filePath = $uploadDir . $fileName;
    if (move_uploaded_file($fileTmp, $filePath)) {
        return $filePath;
    }
    return null;
}

// Save single image
$frontViewPath = saveImage('front_view', $uploadDir);

// Save multiple images as JSON arrays
function saveMultipleImages($inputName, $uploadDir) {
    $paths = array();
    if (isset($_FILES[$inputName])) {
        foreach ($_FILES[$inputName]['tmp_name'] as $key => $tmpName) {
            if ($_FILES[$inputName]['error'][$key] === UPLOAD_ERR_OK) {
                $fileName = uniqid() . '_' . basename($_FILES[$inputName]['name'][$key]);
                $filePath = $uploadDir . $fileName;
                if (move_uploaded_file($tmpName, $filePath)) {
                    $paths[] = $filePath;
                }
            }
        }
    }
    return json_encode($paths);
}

$roomsPaths = saveMultipleImages('rooms', $uploadDir);
$bathroomsPaths = saveMultipleImages('bathrooms', $uploadDir);
$commonAreasPaths = saveMultipleImages('common_areas', $uploadDir);
// $diningAreaPaths = saveMultipleImages('dining_area', $uploadDir);
$exteriorInteriorPaths = saveMultipleImages('exterior_interior', $uploadDir);

// Inserting into database 
$stmt = $conn->prepare("INSERT INTO photo (front_view, rooms, bathrooms, common_areas, building) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $frontViewPath, $roomsPaths, $bathroomsPaths, $commonAreasPaths, $exteriorInteriorPaths);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to save photos"]);
}

$stmt->close();
$conn->close();
?>