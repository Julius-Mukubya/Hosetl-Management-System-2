<!-- 5. Room Information -->
<div class="rooms-section container mt-4">
    <div class="d-flex align-items-center mb-3">
        <label class="form-label mb-0 me-2">Select Hostel:</label>
        <select class="form-control d-inline-block w-auto" id="selectHostelRooms" onchange="fetchHostelRoomDetails(this.value)">
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
            <i class="bi bi-door-open-fill text-primary fs-4"></i>
            <h4 class="mb-0 fw-semibold">4. Room Information</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Available Room Types</label>
                        <select class="form-select" id="roomTypes" multiple>
                            <option value="Single Room">Single Room</option>
                            <option value="Shared Room (2 beds)">Shared Room (2 beds)</option>
                            <option value="Shared Room (3 beds)">Shared Room (3 beds)</option>
                            <option value="Shared Room (4 beds)">Shared Room (4 beds)</option>
                        </select>
                        <div class="error-message text-danger" id="roomTypesError"></div>
                    </div>
                    <div class="col-12" id="dynamicRoomInputs"></div>
                </div>
                <div class="action-buttons mt-4">
                    <button type="button" class="btn btn-primary d-flex align-items-center gap-1" onclick="validateAndSaveRoomSection('rooms-section')">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-secondary d-flex align-items-center gap-1" onclick="clearSection('rooms-section')">
                        <i class="bi bi-x-circle"></i> Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary d-flex align-items-center gap-1" onclick="navigateWithModal('04-description-section')">
                <i class="bi bi-arrow-left"></i> Previous
            </button>
            <button class="btn btn-primary d-flex align-items-center gap-1" onclick="navigateWithModal('06-facilities-section')">
                <i class="bi bi-arrow-right"></i> Next
            </button>
        </div>
    </div>
</div>

<script>
    $("#roomTypes").on('change', updateDynamicInputs)

    function updateDynamicInputs() {
        const roomTypesSelect = document.getElementById('roomTypes');
        const dynamicRoomInputs = document.getElementById('dynamicRoomInputs');
        dynamicRoomInputs.innerHTML = ''; // Clear existing inputs

        const selectedTypes = Array.from(roomTypesSelect.selectedOptions).map(option => option.value);

        selectedTypes.forEach(type => {
            const groupDiv = document.createElement('div');
            groupDiv.className = 'room-type-group';
            groupDiv.innerHTML = `
            <h5>${type}</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Pricing for ${type}</label>
                    <input type="text" class="form-control" id="pricing_${type.replace(/\s+/g, '_')}" placeholder="e.g., 1000 or 1000.50">
                    <div class="error-message text-danger" id="pricingError_${type.replace(/\s+/g, '_')}"></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Availability Count for ${type}</label>
                    <input type="number" class="form-control" id="availability_${type.replace(/\s+/g, '_')}" min="0">
                    <div class="error-message text-danger" id="availabilityError_${type.replace(/\s+/g, '_')}"></div>
                </div>
                <div class="col-12">
                    <label class="form-label">Furnishing for ${type}</label>
                    <textarea class="form-control" id="furnishing_${type.replace(/\s+/g, '_')}" rows="2" placeholder="e.g., bed, mattress, study table, cupboard, fan"></textarea>
                    <div class="error-message text-danger" id="furnishingError_${type.replace(/\s+/g, '_')}"></div>
                </div>
            </div>
        `;
            dynamicRoomInputs.appendChild(groupDiv);
        });
    }

    function validateAndSaveRoomSection(sectionId) {
        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Get form elements
        const roomTypes = document.getElementById('roomTypes').selectedOptions;

        // Validation patterns
        const pricingPattern = /^\d+(\.\d{1,2})?$/;

        // Track validation status
        let isValid = true;

        // Validate inputs for each selected room type
        Array.from(roomTypes).forEach(option => {
            const type = option.value;
            const typeId = type.replace(/\s+/g, '_');
            const pricing = document.getElementById(`pricing_${typeId}`).value.trim();
            const availability = document.getElementById(`availability_${typeId}`).value;
            const furnishing = document.getElementById(`furnishing_${typeId}`).value.trim();

            if (!pricing) {
                document.getElementById(`pricingError_${typeId}`).textContent = `Pricing for ${type} is required`;
                isValid = false;
            } else if (!pricingPattern.test(pricing)) {
                document.getElementById(`pricingError_${typeId}`).textContent = `Please enter a valid price for ${type} (e.g., 1000 or 1000.50)`;
                isValid = false;
            }

            if (availability === '') {
                document.getElementById(`availabilityError_${typeId}`).textContent = `Availability Count for ${type} is required`;
                isValid = false;
            } else if (parseInt(availability) < 0) {
                document.getElementById(`availabilityError_${typeId}`).textContent = `Availability Count for ${type} cannot be negative`;
                isValid = false;
            }

            if (!furnishing) {
                document.getElementById(`furnishingError_${typeId}`).textContent = `Furnishing details for ${type} are required`;
                isValid = false;
            } else if (furnishing.length < 10) {
                document.getElementById(`furnishingError_${typeId}`).textContent = `Furnishing details for ${type} must be at least 10 characters`;
                isValid = false;
            }
        });

        // Proceed with save if all validations pass
        if (isValid) {
            saveSection(sectionId);
        }
    }

    function saveSection() {
        // Collect selected room types
        const roomTypes = Array.from(document.getElementById('roomTypes').selectedOptions).map(option => option.value);
        const rooms = [];

        // Gather data for each selected room type
        roomTypes.forEach(type => {
            const typeId = type.replace(/\s+/g, '_');
            const pricing = document.getElementById(`pricing_${typeId}`).value.trim();
            const availability = document.getElementById(`availability_${typeId}`).value;
            const furnishing = document.getElementById(`furnishing_${typeId}`).value.trim();

            rooms.push({
                type,
                pricing: parseFloat(pricing),
                availability: parseInt(availability),
                furnishing
            });
        });

        // Send data to PHP using fetch
        fetch('../includes/save_rooms.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ rooms })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Room information saved!');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            alert('Network or server error: ' + error);
        });
    }
</script>