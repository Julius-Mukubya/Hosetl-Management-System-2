<!-- 3. Hostel Description -->
<div class="description-section container mt-4">
    <div class="d-flex align-items-center mb-3">
        <label class="form-label mb-0 me-2">Select Hostel:</label>
        <!-- // This select dropdown will be populated with hostel names from the database -->
        <select class="form-control d-inline-block w-auto" id="selectHostelDescription" onchange="fetchHostelDescriptionDetails(this.value)">
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
    <!-- // This card contains the form for hostel description -->
    <div class="card shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white border-bottom-0 rounded-top-4 d-flex align-items-center gap-2">
            <i class="bi bi-card-text text-primary fs-4"></i>
            <h4 class="mb-0 fw-semibold">3. Hostel Description</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label">Overview / Introduction</label>
                    <textarea class="form-control" id="overview" rows="3"></textarea>
                    <div class="error-message text-danger" id="overviewError"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hostel Rules</label>
                    <textarea class="form-control" id="hostelRules" rows="2"></textarea>
                    <div class="error-message text-danger" id="hostelRulesError"></div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Check-in Time</label>
                        <input type="time" class="form-control" id="checkInTime">
                        <div class="error-message text-danger" id="checkInTimeError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Check-out Time</label>
                        <input type="time" class="form-control" id="checkOutTime">
                        <div class="error-message text-danger" id="checkOutTimeError"></div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Security Features</label>
                        <input type="text" class="form-control" id="securityFeatures">
                        <div class="error-message text-danger" id="securityFeaturesError"></div>
                    </div>
                </div>
                <div class="action-buttons mt-4">
                    <button type="button" class="btn btn-primary d-flex align-items-center gap-1" onclick="validateAndSaveDescriptionSection('description-section')">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-secondary d-flex align-items-center gap-1" onclick="clearSection('description-section')">
                        <i class="bi bi-x-circle"></i> Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary d-flex align-items-center gap-1" onclick="navigateWithModal('03-location-section')">
                <i class="bi bi-arrow-left"></i> Previous
            </button>
            <button class="btn btn-primary d-flex align-items-center gap-1" onclick="navigateWithModal('05-rooms-section')">
                <i class="bi bi-arrow-right"></i> Next
            </button>
        </div>
    </div>
</div>

<script>
    function validateAndSaveDescriptionSection(sectionId) {
        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Get form elements
        const overview = document.getElementById('overview').value.trim();
        const hostelRules = document.getElementById('hostelRules').value.trim();
        const checkInTime = document.getElementById('checkInTime').value;
        const checkOutTime = document.getElementById('checkOutTime').value;
        const securityFeatures = document.getElementById('securityFeatures').value.trim();

        // Track validation status
        let isValid = true;

        // Validation checks
        if (!overview) {
            document.getElementById('overviewError').textContent = "Overview is required";
            isValid = false;
        } else if (overview.length < 10) {
            document.getElementById('overviewError').textContent = "Overview must be at least 10 characters";
            isValid = false;
        }

        if (!hostelRules) {
            document.getElementById('hostelRulesError').textContent = "Hostel Rules are required";
            isValid = false;
        } else if (hostelRules.length < 10) {
            document.getElementById('hostelRulesError').textContent = "Hostel Rules must be at least 10 characters";
            isValid = false;
        }

        if (!checkInTime) {
            document.getElementById('checkInTimeError').textContent = "Check-in Time is required";
            isValid = false;
        }

        if (!checkOutTime) {
            document.getElementById('checkOutTimeError').textContent = "Check-out Time is required";
            isValid = false;
        }

        if (!securityFeatures) {
            document.getElementById('securityFeaturesError').textContent = "Security Features are required";
            isValid = false;
        } else if (securityFeatures.length < 5) {
            document.getElementById('securityFeaturesError').textContent = "Security Features must be at least 5 characters";
            isValid = false;
        }

        // Proceed with save if all validations pass
        if (isValid) {
            saveSection(sectionId);
        }
    }

    // Function to send description data to the PHP script using fetch
    function saveSection() {
        // Collect values from form fields
        const overview = document.getElementById('overview').value.trim();
        const hostelRules = document.getElementById('hostelRules').value.trim();
        const checkInTime = document.getElementById('checkInTime').value;
        const checkOutTime = document.getElementById('checkOutTime').value;
        const securityFeatures = document.getElementById('securityFeatures').value.trim();

        // Send data to PHP using fetch
        fetch('../includes/save_description.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                overview,
                hostelRules,
                checkInTime,
                checkOutTime,
                securityFeatures
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Description saved!');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            alert('Network or server error: ' + error);
        });
    }
    // Function to clear the section and populate the form with selected hostel details
    function fetchHostelDescriptionDetails(hostelId) {
        if (!hostelId) return;
        fetch('../includes/get_hosteldetails.php?id=' + encodeURIComponent(hostelId))
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('overview').value = data.hostel.overview || '';
                    document.getElementById('hostelRules').value = data.hostel.hostel_rules || '';
                    document.getElementById('checkInTime').value = data.hostel.check_in_time || '';
                    document.getElementById('checkOutTime').value = data.hostel.check_out_time || '';
                    document.getElementById('securityFeatures').value = data.hostel.security_features || '';
                } else {
                    alert('Hostel description not found!');
                }
            })
            .catch(() => alert('Error fetching hostel description details.'));
    }
</script>