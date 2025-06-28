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
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Select one or more room types below. For each selected type, you'll be able to specify details like price, availability, and furnishing.
                        </div>
                        <select class="form-select" id="roomTypes" multiple>
                            <option value="Single Room">Single Room</option>
                            <option value="Shared Room (2 beds)">Shared Room (2 beds)</option>
                            <option value="Shared Room (3 beds)">Shared Room (3 beds)</option>
                            <option value="Shared Room (4 beds)">Shared Room (4 beds)</option>
                        </select>
                        <small class="text-muted">Hold Ctrl (or Cmd on Mac) to select multiple room types</small>
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

        if (selectedTypes.length === 0) {
            dynamicRoomInputs.innerHTML = `
                <div class="alert alert-warning">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Please select at least one room type to add details.
                </div>`;
            return;
        }

        selectedTypes.forEach((type, index) => {
            const groupDiv = document.createElement('div');
            groupDiv.className = 'card mb-3 border-primary';
            groupDiv.innerHTML = `
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h6 class="mb-0"><i class="bi bi-house-door me-2"></i>${type}</h6>
                    <span class="badge bg-light text-primary">Room ${index + 1}</span>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Price per Month</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="pricing_${type.replace(/\s+/g, '_')}" placeholder="Enter price" min="0" step="0.01">
                            </div>
                            <div class="error-message text-danger" id="pricingError_${type.replace(/\s+/g, '_')}"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Number of Available Rooms</label>
                            <input type="number" class="form-control" id="availability_${type.replace(/\s+/g, '_')}" placeholder="Enter count" min="0">
                            <div class="error-message text-danger" id="availabilityError_${type.replace(/\s+/g, '_')}"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Room Size (optional)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="size_${type.replace(/\s+/g, '_')}" placeholder="Size" min="0" step="0.1">
                                <span class="input-group-text">sq ft</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Max Occupancy</label>
                            <select class="form-select" id="occupancy_${type.replace(/\s+/g, '_')}">
                                <option value="1">1 person</option>
                                <option value="2">2 people</option>
                                <option value="3">3 people</option>
                                <option value="4">4 people</option>
                                <option value="5">5+ people</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Furnishing Details</label>
                            <textarea class="form-control" id="furnishing_${type.replace(/\s+/g, '_')}" rows="2" placeholder="e.g., Bed, Wardrobe, Study Table, Chair, Air Conditioning, etc."></textarea>
                            <div class="error-message text-danger" id="furnishingError_${type.replace(/\s+/g, '_')}"></div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Additional Features (optional)</label>
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="ac_${type.replace(/\s+/g, '_')}" value="Air Conditioning">
                                        <label class="form-check-label" for="ac_${type.replace(/\s+/g, '_')}">Air Conditioning</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="heating_${type.replace(/\s+/g, '_')}" value="Heating">
                                        <label class="form-check-label" for="heating_${type.replace(/\s+/g, '_')}">Heating</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="balcony_${type.replace(/\s+/g, '_')}" value="Balcony">
                                        <label class="form-check-label" for="balcony_${type.replace(/\s+/g, '_')}">Balcony</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="ensuite_${type.replace(/\s+/g, '_')}" value="En-suite Bathroom">
                                        <label class="form-check-label" for="ensuite_${type.replace(/\s+/g, '_')}">En-suite Bathroom</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            dynamicRoomInputs.appendChild(groupDiv);
        });

        // Add summary section
        const summaryDiv = document.createElement('div');
        summaryDiv.className = 'alert alert-success mt-3';
        summaryDiv.innerHTML = `
            <i class="bi bi-check-circle me-2"></i>
            <strong>${selectedTypes.length}</strong> room type${selectedTypes.length > 1 ? 's' : ''} selected. 
            Please fill in the details for each room type above.
        `;
        dynamicRoomInputs.appendChild(summaryDiv);
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
            const size = document.getElementById(`size_${typeId}`)?.value || '';
            const occupancy = document.getElementById(`occupancy_${typeId}`)?.value || '1';
            
            // Collect additional features
            const additionalFeatures = [];
            const ac = document.getElementById(`ac_${typeId}`);
            const heating = document.getElementById(`heating_${typeId}`);
            const balcony = document.getElementById(`balcony_${typeId}`);
            const ensuite = document.getElementById(`ensuite_${typeId}`);
            
            if (ac?.checked) additionalFeatures.push(ac.value);
            if (heating?.checked) additionalFeatures.push(heating.value);
            if (balcony?.checked) additionalFeatures.push(balcony.value);
            if (ensuite?.checked) additionalFeatures.push(ensuite.value);

            rooms.push({
                type,
                pricing: parseFloat(pricing),
                availability: parseInt(availability),
                furnishing,
                size: size ? parseFloat(size) : null,
                occupancy: parseInt(occupancy),
                additionalFeatures
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