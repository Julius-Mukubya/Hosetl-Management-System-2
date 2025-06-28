<?php
// Test database connection and table structure
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Database Connection Test</h2>";

// Database connection settings
$host = "localhost";
$user = "root";
$pass = "";
$db = "hostel_system";

try {
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    echo "<p style='color: green;'>✓ Database connection successful!</p>";
    
    // Check if required tables exist
    $required_tables = array(
        'owners',
        'hostels', 
        'hostel_locations',
        'hostel_descriptions',
        'room_types',
        'hostel_rooms',
        'facilities',
        'hostel_facilities',
        'hostel_photos',
        'availability_status'
    );
    
    echo "<h3>Checking Required Tables:</h3>";
    $missing_tables = array();
    
    foreach ($required_tables as $table) {
        $result = $conn->query("SHOW TABLES LIKE '$table'");
        if ($result && $result->num_rows > 0) {
            echo "<p style='color: green;'>✓ Table '$table' exists</p>";
        } else {
            echo "<p style='color: red;'>✗ Table '$table' missing</p>";
            $missing_tables[] = $table;
        }
    }
    
    if (empty($missing_tables)) {
        echo "<p style='color: green;'><strong>All required tables exist!</strong></p>";
        
        // Check if default data exists
        echo "<h3>Checking Default Data:</h3>";
        
        $result = $conn->query("SELECT COUNT(*) as count FROM room_types");
        $row = $result->fetch_assoc();
        echo "<p>Room types in database: " . $row['count'] . "</p>";
        
        $result = $conn->query("SELECT COUNT(*) as count FROM facilities");
        $row = $result->fetch_assoc();
        echo "<p>Facilities in database: " . $row['count'] . "</p>";
        
        $result = $conn->query("SELECT COUNT(*) as count FROM payment_methods");
        $row = $result->fetch_assoc();
        echo "<p>Payment methods in database: " . $row['count'] . "</p>";
        
        if ($row['count'] == 0) {
            echo "<p style='color: orange;'>⚠ No default data found. Run the populate_default_data.sql script.</p>";
        }
        
    } else {
        echo "<p style='color: red;'><strong>Missing tables: " . implode(', ', $missing_tables) . "</strong></p>";
        echo "<p>Please run the database_schema.sql script first.</p>";
    }
    
    $conn->close();
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
}
?>

<h3>Next Steps:</h3>
<ol>
    <li>If tables are missing, run: <code>database_schema.sql</code></li>
    <li>If no default data, run: <code>populate_default_data.sql</code></li>
    <li>Test the Add Hostel functionality</li>
</ol> 