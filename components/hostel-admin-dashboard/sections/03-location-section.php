<!-- 3. Location Information -->
<div class="location-section container mt-4">
    <div class="d-flex align-items-center mb-3">
        <label class="form-label mb-0 me-2">Select Hostel:</label>
        <select class="form-control d-inline-block w-auto" id="selectHostelLocation" onchange="fetchHostelLocationDetails(this.value)">
            <option value="" selected disabled>Select Hostel</option>
            <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "hostel_system";
            $conn = new mysqli($host, $user, $pass, $db);
            if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

            $sql = "SELECT id, name FROM hostels ORDER BY name ASC";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                }
            } else {
                echo '<option disabled>No hostels found</option>';
            }
            $conn->close();
            ?>
        </select>
    </div>
    <div class="card shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white border-bottom-0 rounded-top-4 d-flex align-items-center gap-2">
            <i class="bi bi-geo-alt-fill text-primary fs-4"></i>
            <h4 class="mb-0 fw-semibold">2. Location Information</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Address</label>
                        <input type="text" class="form-control" id="fullAddress" placeholder="e.g., 123 Hostel St, Block A">
                        <div class="error-message text-danger" id="fullAddressError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" id="city" placeholder="e.g., Nairobi">
                        <div class="error-message text-danger" id="cityError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nearby Landmarks or Institutions</label>
                        <input type="text" class="form-control" id="landmarks" placeholder="e.g., University of Nairobi, Sarit Centre">
                        <div class="error-message text-danger" id="landmarksError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Distance from Main Campus (optional)</label>
                        <input type="text" class="form-control" id="distance" placeholder="e.g., 1.2 km">
                        <div class="error-message text-danger" id="distanceError"></div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Directions (optional)</label>
                        <textarea class="form-control" id="directions" rows="2" placeholder="e.g., From XYZ junction, take the second left past ABC Plaza. The hostel is the white gate on the right."></textarea>
                        <div class="error-message text-danger" id="directionsError"></div>
                    </div>
                </div>
                <div class="action-buttons mt-4">
                    <button type="button" class="btn btn-primary d-flex align-items-center gap-1" onclick="validateAndSaveLocationSection('location-section')">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-secondary d-flex align-items-center gap-1" onclick="clearSection('location-section')">
                        <i class="bi bi-x-circle"></i> Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary d-flex align-items-center gap-1" onclick="navigateWithModal('02-basic-info-section')">
                <i class="bi bi-arrow-left"></i> Previous
            </button>
            <button class="btn btn-primary d-flex align-items-center gap-1" onclick="navigateWithModal('04-description-section')">
                <i class="bi bi-arrow-right"></i> Next
            </button>
        </div>
    </div>
</div>

<script>
    // Function to validate and save the location section
    function validateAndSaveLocationSection(sectionId) {
        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Get form values
        const fullAddress = document.getElementById('fullAddress').value.trim();
        const city = document.getElementById('city').value.trim();
        const landmarks = document.getElementById('landmarks').value.trim();
        const distance = document.getElementById('distance').value.trim();
        const directions = document.getElementById('directions').value.trim();

        // Validation pattern for distance (e.g., "1.2 km" or "500 m")
        const distancePattern = /^\d+(\.\d{1,2})?\s*(km|m)$/i;

        // Track validation status
        let isValid = true;

        // Validate required fields
        if (!fullAddress) {
            document.getElementById('fullAddressError').textContent = "Full Address is required";
            isValid = false;
        }
        if (!city) {
            document.getElementById('cityError').textContent = "City is required";
            isValid = false;
        }
        if (landmarks && landmarks.length < 3) {
            document.getElementById('landmarksError').textContent = "Landmarks must be at least 3 characters if provided";
            isValid = false;
        }
        if (distance && !distancePattern.test(distance)) {
            document.getElementById('distanceError').textContent = "Please enter a valid distance (e.g., 1.2 km or 500 m)";
            isValid = false;
        }
        if (directions && directions.length < 10) {
            document.getElementById('directionsError').textContent = "Directions must be at least 10 characters if provided";
            isValid = false;
        }

        // If all validations pass, send data to the server
        if (isValid) {
            saveLocationSection(fullAddress, city, landmarks, distance, directions);
        }
    }

    // Function to send location data to the PHP script using fetch
    function saveLocationSection(fullAddress, city, landmarks, distance, directions) {
        fetch('../includes/save_location.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                fullAddress,
                city,
                landmarks,
                distance,
                directions
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Location saved!');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            alert('Network or server error: ' + error);
        });
    }
// TO fetch hostel location details when a hostel is selected
    function fetchHostelLocationDetails(hostelId) {
        if (!hostelId) return;
        fetch('../includes/get_hosteldetails.php?id=' + encodeURIComponent(hostelId))
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('fullAddress').value = data.hostel.address || '';
                    document.getElementById('city').value = data.hostel.city || '';
                    document.getElementById('landmarks').value = data.hostel.landmarks || '';
                    document.getElementById('distance').value = data.hostel.distance_from_campus || '';
                    document.getElementById('directions').value = data.hostel.directions || '';
                } else {
                    alert('Hostel location not found!');
                }
            })
            .catch(() => alert('Error fetching hostel location details.'));
    }
</script>