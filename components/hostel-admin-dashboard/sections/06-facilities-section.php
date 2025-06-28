<!-- 5. Facilities & Amenities -->
<div class="facilities-section container mt-4">
    <div class="d-flex align-items-center mb-3">
        <label class="form-label mb-0 me-2">Select Hostel:</label>
        <select class="form-control d-inline-block w-auto" id="selectHostelFacilities" onchange="fetchHostelFacilities(this.value)">
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
            <i class="bi bi-check2-square text-primary fs-4"></i>
            <h4 class="mb-0 fw-semibold">5. Facilities & Amenities</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row row-cols-2 row-cols-md-3 g-2">
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Wi-Fi" id="wifi">
                        <label class="form-check-label" for="wifi">Wi-Fi</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Electricity Backup / Generator" id="electricity">
                        <label class="form-check-label" for="electricity">Electricity Backup / Generator</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Laundry Services" id="laundry">
                        <label class="form-check-label" for="laundry">Laundry Services</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Meals" id="meals">
                        <label class="form-check-label" for="meals">Meals (Breakfast/Lunch/Dinner)</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Attached Bathroom" id="bathroom">
                        <label class="form-check-label" for="bathroom">Attached Bathroom</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Common Area" id="commonArea">
                        <label class="form-check-label" for="commonArea">Common Area</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Study Room / Library" id="library">
                        <label class="form-check-label" for="library">Study Room / Library</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Gym / Fitness Room" id="gym">
                        <label class="form-check-label" for="gym">Gym / Fitness Room</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Water Purifier" id="purifier">
                        <label class="form-check-label" for="purifier">Water Purifier</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Housekeeping / Cleaning" id="housekeeping">
                        <label class="form-check-label" for="housekeeping">Housekeeping / Cleaning</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Parking" id="parking">
                        <label class="form-check-label" for="parking">Parking</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Elevator" id="elevator">
                        <label class="form-check-label" for="elevator">Elevator</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Balcony" id="balcony">
                        <label class="form-check-label" for="balcony">Balcony</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="TV" id="tv">
                        <label class="form-check-label" for="tv">TV</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Air Conditioning" id="ac">
                        <label class="form-check-label" for="ac">Air Conditioning</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="CCTV Surveillance" id="cctv">
                        <label class="form-check-label" for="cctv">CCTV Surveillance</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="Biometric Entry" id="biometric">
                        <label class="form-check-label" for="biometric">Biometric Entry</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" value="24/7 Security" id="security">
                        <label class="form-check-label" for="security">24/7 Security</label>
                    </div>
                </div>
                <div class="error-message text-danger" id="facilitiesError"></div>
                <div class="action-buttons mt-4">
                    <button type="button" class="btn btn-primary d-flex align-items-center gap-1" onclick="validateAndSaveFacilitiesSection('facilities-section')">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-secondary d-flex align-items-center gap-1" onclick="clearSection('facilities-section')">
                        <i class="bi bi-x-circle"></i> Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary d-flex align-items-center gap-1" onclick="navigateWithModal('05-rooms-section')">
                <i class="bi bi-arrow-left"></i> Previous
            </button>
            <button class="btn btn-primary d-flex align-items-center gap-1" onclick="navigateWithModal('07-photos-section')">
                <i class="bi bi-arrow-right"></i> Next
            </button>
        </div>
    </div>
</div>

<script>
    function validateAndSaveFacilitiesSection(sectionId) {
        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Get form elements
        const checkboxes = document.querySelectorAll('.facilities-section .form-check-input');
        const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;

        // Track validation status
        let isValid = true;

        // Validation checks
        if (checkedCount === 0) {
            document.getElementById('facilitiesError').textContent = "At least one facility must be selected";
            isValid = false;
        }

        // Proceed with save if all validations pass
        if (isValid) {
            saveSection(sectionId);
        }
    }

    function saveSection() {
        // Collect all checked facilities
        const checkboxes = document.querySelectorAll('.facilities-section .form-check-input');
        const facilities = Array.from(checkboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        // Send data to PHP using fetch
        fetch('../includes/save_facilities.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ facilities })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Facilities saved!');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            alert('Network or server error: ' + error);
        });
    }
</script>