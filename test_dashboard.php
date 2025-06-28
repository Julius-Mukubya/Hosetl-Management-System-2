<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Dashboard Test</h1>
        
        <?php
        // Test database connection
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
            
            // Test facilities query
            $sql = "SELECT COUNT(*) as count FROM facilities";
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_assoc();
                echo "<p>Facilities in database: " . $row['count'] . "</p>";
            }
            
            $conn->close();
        } catch (Exception $e) {
            echo "<p style='color: red;'>✗ Database error: " . $e->getMessage() . "</p>";
        }
        ?>
        
        <div id="dashboard-content">
            <!-- Include the dashboard section here -->
            <?php include 'components/hostel-admin-dashboard/sections/01-dashboard-section.php'; ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        console.log('Test page loaded');
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded');
            const addHostelBtn = document.getElementById('addHostelBtn');
            if (addHostelBtn) {
                console.log('Add Hostel button found');
                addHostelBtn.addEventListener('click', function() {
                    console.log('Add Hostel button clicked');
                    alert('Add Hostel button clicked!');
                });
            } else {
                console.log('Add Hostel button not found');
            }
        });
    </script>
</body>
</html> 