<div class="dashboard-section container mt-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <h2 class="fw-bold mb-0"><i class="bi bi-house-door-fill me-2 text-primary"></i>Hostel Dashboard</h2>
        <div class="d-flex align-items-center gap-2">
            <label class="form-label mb-0 me-2">Select Hostel:</label>
            <select class="form-control d-inline-block w-auto me-2">
                <?php
                // Use your database connection here
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
            <button class="btn btn-success d-flex align-items-center gap-1" id="addHostelBtn">
                <i class="bi bi-plus-lg"></i> Add Hostel
            </button>
        </div>
    </div>

    <div class="modal fade" id="addHostelModal" tabindex="-1" aria-labelledby="addHostelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addHostelModalLabel"><i class="bi bi-plus-circle me-2"></i>Add New Hostel</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="progress mb-4" style="height: 8px;">
                        <div id="wizardProgress" class="progress-bar bg-primary" role="progressbar" style="width: 14%"></div>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold step-label" id="stepLabel1">1. Basic Info</span>
                        <span class="fw-bold step-label" id="stepLabel2">2. Location</span>
                        <span class="fw-bold step-label" id="stepLabel3">3. Description</span>
                        <span class="fw-bold step-label" id="stepLabel4">4. Rooms</span>
                        <span class="fw-bold step-label" id="stepLabel5">5. Facilities</span>
                        <span class="fw-bold step-label" id="stepLabel6">6. Photos</span>
                        <span class="fw-bold step-label" id="stepLabel7">7. Booking Info</span>
                        <span class="fw-bold step-label" id="stepLabel8">8. Availability</span>
                        <span class="fw-bold step-label" id="stepLabel9">9. Review</span>
                    </div>
                    <form id="addHostelWizardForm">
                        <div class="wizard-step" id="wizardStep1">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Hostel Name</label>
                                    <input type="text" class="form-control" id="wizardHostelName">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Type</label>
                                    <select class="form-select" id="wizardHostelType">
                                        <option value="" selected disabled>--Select Hostel Type--</option>
                                        <option value="Mixed">Mixed</option>
                                        <option value="Boys">Boys</option>
                                        <option value="Girls">Girls</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Owner Name</label>
                                    <input type="text" class="form-control" id="wizardOwnerName">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="wizardContactNumber">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="wizardEmailAddress">
                                </div>
                            </div>
                        </div>
                        <div class="wizard-step d-none" id="wizardStep2">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Address</label>
                                    <input type="text" class="form-control" id="wizardFullAddress">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" id="wizardCity">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nearby Landmarks</label>
                                    <input type="text" class="form-control" id="wizardLandmarks">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Distance from Main Campus (optional)</label>
                                    <input type="text" class="form-control" id="wizardDistance">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Directions (optional)</label>
                                    <textarea class="form-control" id="wizardDirections" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-step d-none" id="wizardStep3">
                            <div class="mb-3">
                                <label class="form-label">Overview / Introduction</label>
                                <textarea class="form-control" id="wizardOverview" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hostel Rules</label>
                                <textarea class="form-control" id="wizardHostelRules" rows="2"></textarea>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Check-in Time</label>
                                    <input type="time" class="form-control" id="wizardCheckInTime">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Check-out Time</label>
                                    <input type="time" class="form-control" id="wizardCheckOutTime">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Security Features</label>
                                    <input type="text" class="form-control" id="wizardSecurityFeatures">
                                </div>
                            </div>
                        </div>
                        <div class="wizard-step d-none" id="wizardStep4">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Available Room Types</label>
                                    <select class="form-select" id="wizardRoomTypes" multiple>
                                        <option value="Single Room">Single Room</option>
                                        <option value="Shared Room (2 beds)">Shared Room (2 beds)</option>
                                        <option value="Shared Room (3 beds)">Shared Room (3 beds)</option>
                                        <option value="Shared Room (4 beds)">Shared Room (4 beds)</option>
                                    </select>
                                </div>
                                <div class="col-12 d-none" id="wizardDynamicRoomInputs"></div>
                            </div>
                        </div>
                        <div class="wizard-step d-none" id="wizardStep5">
                            <div class="row">
                                <?php
                                // Load facilities from database
                                $host = "localhost";
                                $user = "root";
                                $pass = "";
                                $db = "hostel_system";
                                $conn = new mysqli($host, $user, $pass, $db);
                                if ($conn->connect_error) {
                                    echo '<div class="col-12"><p class="text-danger">Database connection failed</p></div>';
                                } else {
                                    $sql = "SELECT id, name, category FROM facilities ORDER BY category, name ASC";
                                    $result = $conn->query($sql);

                                    if ($result && $result->num_rows > 0) {
                                        $currentCategory = '';
                                        $firstCategory = true;
                                        
                                        while ($row = $result->fetch_assoc()) {
                                            // Add category header if category changes
                                            if ($currentCategory != $row['category']) {
                                                if (!$firstCategory) {
                                                    echo '</div>'; // Close previous category group
                                                    echo '</div>'; // Close previous category container
                                                }
                                                $currentCategory = $row['category'];
                                                $firstCategory = false;
                                                echo '<div class="col-12 mb-4">';
                                                echo '<h5 class="text-primary mb-3 border-bottom pb-2">' . ucfirst($currentCategory) . ' Facilities</h5>';
                                                echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">';
                                            }
                                            
                                            $facilityId = 'wizardFacility_' . $row['id'];
                                            echo '<div class="col">';
                                            echo '<div class="form-check px-3">';
                                            echo '<input class="form-check-input me-3" type="checkbox" value="' . htmlspecialchars($row['name']) . '" id="' . $facilityId . '">';
                                            echo '<label class="form-check-label fw-medium" for="' . $facilityId . '">' . htmlspecialchars($row['name']) . '</label>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                        
                                        // Close the last category group and container
                                        if (!$firstCategory) {
                                            echo '</div>'; // Close last category group
                                            echo '</div>'; // Close last category container
                                        }
                                    } else {
                                        echo '<div class="col-12">';
                                        echo '<p class="text-muted">No facilities found in database.</p>';
                                        echo '</div>';
                                    }
                                    $conn->close();
                                }
                                ?>
                            </div>
                        </div>
                        <div class="wizard-step d-none" id="wizardStep6">
                            <div class="photo-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                                <!-- Front View -->
                                <div class="photo-upload-section">
                                    <label for="wizardFrontView" class="form-label">Front View</label>
                                    <div id="wizardFrontViewPreview" class="picture-box picture-box-placeholder" style="border: 1px solid #dee2e6; min-height: 150px; margin-bottom: 10px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                                        <i class="bi bi-image fs-1"></i>
                                    </div>
                                    <input type="file" class="form-control" id="wizardFrontView" accept="image/*" style="display: none;">
                                    <div class="button-group mt-2" style="display: flex; gap: 10px;">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('wizardFrontView').click()">Upload</button>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="removeWizardImage('wizardFrontView', 'wizardFrontViewPreview')">Remove</button>
                                    </div>
                                </div>

                                <!-- Rooms -->
                                <div class="photo-upload-section">
                                    <label for="wizardRoomsPhotos" class="form-label">Rooms</label>
                                    <div id="wizardRoomsPreview" class="multi-picture-box-container" style="border: 1px solid #dee2e6; min-height: 150px; margin-bottom: 10px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                                        <i class="bi bi-images fs-1"></i>
                                    </div>
                                    <input type="file" class="form-control" id="wizardRoomsPhotos" accept="image/*" multiple style="display: none;">
                                    <div class="button-group mt-2" style="display: flex; gap: 10px;">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('wizardRoomsPhotos').click()">Upload</button>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="removeWizardImage('wizardRoomsPhotos', 'wizardRoomsPreview')">Remove</button>
                                    </div>
                                </div>

                                <!-- Bathrooms -->
                                <div class="photo-upload-section">
                                    <label for="wizardBathrooms" class="form-label">Bathrooms</label>
                                    <div id="wizardBathroomsPreview" class="multi-picture-box-container" style="border: 1px solid #dee2e6; min-height: 150px; margin-bottom: 10px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                                        <i class="bi bi-images fs-1"></i>
                                    </div>
                                    <input type="file" class="form-control" id="wizardBathrooms" accept="image/*" multiple style="display: none;">
                                    <div class="button-group mt-2" style="display: flex; gap: 10px;">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('wizardBathrooms').click()">Upload</button>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="removeWizardImage('wizardBathrooms', 'wizardBathroomsPreview')">Remove</button>
                                    </div>
                                </div>

                                <!-- Common Areas -->
                                <div class="photo-upload-section">
                                    <label for="wizardCommonAreas" class="form-label">Common Areas</label>
                                    <div id="wizardCommonAreasPreview" class="multi-picture-box-container" style="border: 1px solid #dee2e6; min-height: 150px; margin-bottom: 10px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                                        <i class="bi bi-images fs-1"></i>
                                    </div>
                                    <input type="file" class="form-control" id="wizardCommonAreas" accept="image/*" multiple style="display: none;">
                                    <div class="button-group mt-2" style="display: flex; gap: 10px;">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('wizardCommonAreas').click()">Upload</button>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="removeWizardImage('wizardCommonAreas', 'wizardCommonAreasPreview')">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-step d-none" id="wizardStep7">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Minimum Booking Duration</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="wizardMinBookingDuration" placeholder="e.g., 30" min="1">
                                        <select class="form-select" id="wizardMinBookingUnit" style="max-width: 150px;">
                                            <option selected value="Hours">Hours</option>
                                            <option value="Days">Days</option>
                                            <option value="Weeks">Weeks</option>
                                            <option value="Months">Months</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Advance Payment Required</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="wizardAdvancePayment" placeholder="e.g., 1000 or 1000.50">
                                        <input type="text" class="form-control" id="wizardAdvancePaymentUnit" placeholder="e.g., USD, KES" style="max-width: 150px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Refund Policy</label>
                                    <textarea class="form-control" id="wizardRefundPolicy" rows="2" placeholder="e.g., Full refund if canceled 7 days prior"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Available Payment Methods</label>
                                    <div class="payment-methods">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="wizardPaymentCash" value="Cash">
                                            <label class="form-check-label" for="wizardPaymentCash">Cash</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="wizardPaymentMobileMoney" value="Mobile Money">
                                            <label class="form-check-label" for="wizardPaymentMobileMoney">Mobile Money</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="wizardPaymentBankTransfer" value="Bank Transfer">
                                            <label class="form-check-label" for="wizardPaymentBankTransfer">Bank Transfer</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-step d-none" id="wizardStep8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Currently Accepting bookings?</label>
                                    <select class="form-select" id="wizardAcceptingBookings">
                                        <option value="" selected disabled>Select an option</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Available From</label>
                                    <input type="date" class="form-control" id="wizardAvailableFrom">
                                </div>
                            </div>
                        </div>
                        <div class="wizard-step d-none" id="wizardStep9">
                            <div id="wizardReviewContent"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" id="wizardPrevBtn" disabled>
                                <i class="bi bi-arrow-left me-1"></i> Previous
                            </button>
                            <div>
                                <button type="button" class="btn btn-outline-danger me-2" id="wizardClearBtn">
                                    <i class="bi bi-x-circle me-1"></i> Clear
                                </button>
                                <button type="button" class="btn btn-success me-2" id="wizardSaveBtn">
                                    <i class="bi bi-save me-1"></i> Save
                                </button>
                                <button type="button" class="btn btn-warning me-2" id="wizardExitBtn">
                                    <i class="bi bi-x-lg me-1"></i> Exit
                                </button>
                                <button type="button" class="btn btn-primary" id="wizardNextBtn">
                                    → Next
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow-sm rounded-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center border-bottom-0 rounded-top-4">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-building me-2 text-primary"></i>Hostel Listings</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "hostel_system";
                        $conn = new mysqli($host, $user, $pass, $db);
                        if ($conn->connect_error) {
                            echo '<tr><td colspan="4" class="text-center text-danger">Database connection failed</td></tr>';
                        } else {
                            $sql = "SELECT id, name, city FROM hostels ORDER BY created_at DESC";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['city']) . '</td>';
                                    echo '<td><span class="badge bg-success">Active</span></td>';
                                    echo '<td>';
                                    echo '<button class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil"></i> Edit</button>';
                                    echo '<button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="4" class="text-center">No hostels found.</td></tr>';
                            }
                            $conn->close();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-4 g-3">
        <div class="col-md-4">
            <div class="card text-center shadow-sm rounded-4">
                <div class="card-body">
                    <h6 class="card-title text-muted">Average Rating</h6>
                    <p class="fs-4 mb-0 fw-bold">4.3 <i class="bi bi-star-fill text-warning"></i></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm rounded-4">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Reviews</h6>
                    <p class="fs-4 mb-0 fw-bold">124</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm rounded-4">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Inquiries</h6>
                    <p class="fs-4 mb-0 fw-bold">57</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow-sm rounded-4">
        <div class="card-header bg-white border-bottom-0 rounded-top-4">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-chat-left-text me-2 text-primary"></i>Recent Reviews</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>User</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jane Doe</td>
                            <td>5 <i class="bi bi-star-fill text-warning"></i></td>
                            <td>Great location and clean rooms!</td>
                            <td>2025-05-28</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-5 shadow-sm rounded-4">
        <div class="card-header bg-white border-bottom-0 rounded-top-4">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-question-circle me-2 text-primary"></i>Recent Inquiries</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Smith</td>
                            <td>+256700000000</td>
                            <td>Is there a shared room available?</td>
                            <td>2025-05-30</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Check if already initialized to prevent conflicts
    if (window.wizardInitialized) {
        return;
    }
    window.wizardInitialized = true;

    // Wizard state
    let wizardStep = 1;
    const totalSteps = 9;

    function showWizardStep(step) {
        for (let i = 1; i <= totalSteps; i++) {
            const stepElement = document.getElementById('wizardStep' + i);
            const labelElement = document.getElementById('stepLabel' + i);
            
            if (stepElement) {
                const shouldShow = i === step;
                stepElement.classList.toggle('d-none', !shouldShow);
            }
            
            if (labelElement) {
                labelElement.classList.toggle('text-primary', i === step);
            }
        }
        
        const prevBtn = document.getElementById('wizardPrevBtn');
        const nextBtn = document.getElementById('wizardNextBtn');
        const progressBar = document.getElementById('wizardProgress');
        
        if (prevBtn) prevBtn.disabled = step === 1;
        if (nextBtn) nextBtn.textContent = step === totalSteps ? 'Submit' : 'Next';
        if (progressBar) progressBar.style.width = (step / totalSteps * 100) + '%';
    }

    function wizardNextStep() {
        // Comment out validation for now
        // if (!validateWizardStep(wizardStep)) return;
        
        if (wizardStep < totalSteps) {
            wizardStep++;
            showWizardStep(wizardStep);
            if (wizardStep === totalSteps) {
                fillWizardReview();
            }
        } else {
            // On submit, collect all data and send via AJAX
            const formData = new FormData();

            // Basic Info
            formData.append('hostel_name', document.getElementById('wizardHostelName').value);
            formData.append('hostel_type', document.getElementById('wizardHostelType').value);
            formData.append('owner_name', document.getElementById('wizardOwnerName').value);
            formData.append('contact_number', document.getElementById('wizardContactNumber').value);
            formData.append('email', document.getElementById('wizardEmailAddress').value);

            // Location
            formData.append('address', document.getElementById('wizardFullAddress').value);
            formData.append('city', document.getElementById('wizardCity').value);
            formData.append('landmarks', document.getElementById('wizardLandmarks').value);
            formData.append('distance', document.getElementById('wizardDistance').value);
            formData.append('directions', document.getElementById('wizardDirections').value);

            // Description
            formData.append('overview', document.getElementById('wizardOverview').value);
            formData.append('hostel_rules', document.getElementById('wizardHostelRules').value);
            formData.append('check_in_time', document.getElementById('wizardCheckInTime').value);
            formData.append('check_out_time', document.getElementById('wizardCheckOutTime').value);
            formData.append('security_features', document.getElementById('wizardSecurityFeatures').value);

            // Rooms (collect selected room types and their details)
            const roomTypes = Array.from(document.getElementById('wizardRoomTypes').selectedOptions).map(opt => opt.value);
            const roomDetails = [];
            
            roomTypes.forEach((roomType, index) => {
                const price = document.getElementById(`room_price_${index}`)?.value || '0';
                const availability = document.getElementById(`room_availability_${index}`)?.value || '0';
                const furnishing = document.getElementById(`room_furnishing_${index}`)?.value || 'To be specified';
                
                roomDetails.push({
                    type: roomType,
                    price: price,
                    availability: availability,
                    furnishing: furnishing
                });
                
                formData.append('room_types[]', roomType);
                formData.append('room_prices[]', price);
                formData.append('room_availability[]', availability);
                formData.append('room_furnishing[]', furnishing);
            });

            // Facilities (collect checked facilities)
            const facilities = [];
            document.querySelectorAll('#wizardStep5 .form-check-input:checked').forEach(checkbox => {
                facilities.push(checkbox.value);
            });
            facilities.forEach(facility => {
                formData.append('facilities[]', facility);
            });

            // Photos (collect file inputs)
            const frontView = document.getElementById('wizardFrontView');
            if (frontView.files.length > 0) {
                formData.append('front_view', frontView.files[0]);
            }

            const roomsPhotos = document.getElementById('wizardRoomsPhotos');
            if (roomsPhotos.files.length > 0) {
                for (let i = 0; i < roomsPhotos.files.length; i++) {
                    formData.append('room_photos[]', roomsPhotos.files[i]);
                }
            }

            // New photo fields
            const bathrooms = document.getElementById('wizardBathrooms');
            if (bathrooms.files.length > 0) {
                for (let i = 0; i < bathrooms.files.length; i++) {
                    formData.append('bathroom_photos[]', bathrooms.files[i]);
                }
            }

            const commonAreas = document.getElementById('wizardCommonAreas');
            if (commonAreas.files.length > 0) {
                for (let i = 0; i < commonAreas.files.length; i++) {
                    formData.append('common_area_photos[]', commonAreas.files[i]);
                }
            }

            // Booking Info
            formData.append('min_booking_duration', document.getElementById('wizardMinBookingDuration').value);
            formData.append('min_booking_unit', document.getElementById('wizardMinBookingUnit').value);
            formData.append('advance_payment', document.getElementById('wizardAdvancePayment').value);
            formData.append('advance_payment_unit', document.getElementById('wizardAdvancePaymentUnit').value);
            formData.append('refund_policy', document.getElementById('wizardRefundPolicy').value);

            // Payment methods
            const paymentMethods = [];
            document.querySelectorAll('#wizardStep7 .form-check-input:checked').forEach(checkbox => {
                paymentMethods.push(checkbox.value);
            });
            paymentMethods.forEach(method => {
                formData.append('payment_methods[]', method);
            });

            // Availability Status
            formData.append('accepting_bookings', document.getElementById('wizardAcceptingBookings').value);
            formData.append('available_from', document.getElementById('wizardAvailableFrom').value);

            // Submit the form data
            fetch('../includes/add_hostel.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.includes('successfully')) {
                    alert('Hostel added successfully!');
                    // Clear form and close modal
                    wizardClear();
                    exitWizard();
                    // Optionally refresh the page or update the hostel list
                    location.reload();
                } else {
                    alert('Error: ' + data);
                }
            })
            .catch(error => {
                alert('Network error: ' + error);
            });
        }
    }

    function wizardPrevStep() {
        if (wizardStep > 1) {
            wizardStep--;
            showWizardStep(wizardStep);
        }
    }

    function wizardClear() {
        const form = document.getElementById('addHostelWizardForm');
        if (form) form.reset();
        wizardStep = 1;
        showWizardStep(wizardStep);
    }

    function exitWizard() {
        const modalElement = document.getElementById('addHostelModal');
        if (modalElement) {
            const modal = bootstrap.Modal.getInstance(modalElement);
            if (modal) {
                modal.hide();
            } else {
                // If Bootstrap modal instance not found, use manual cleanup
                if (typeof cleanupModal === 'function') {
                    cleanupModal();
                } else {
                    // Fallback cleanup
                    modalElement.classList.remove('show');
                    modalElement.style.display = 'none';
                    document.body.classList.remove('modal-open');
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    backdrops.forEach(backdrop => backdrop.remove());
                }
            }
        }
    }

    function validateWizardStep(step) {
        if (step === 1) {
            if (!document.getElementById('wizardHostelName').value.trim()) {
                alert('Hostel Name is required');
                return false;
            }
            if (!document.getElementById('wizardHostelType').value) {
                alert('Hostel Type is required');
                return false;
            }
            if (!document.getElementById('wizardOwnerName').value.trim()) {
                alert('Owner Name is required');
                return false;
            }
            if (!document.getElementById('wizardContactNumber').value.trim()) {
                alert('Contact Number is required');
                return false;
            }
            if (!document.getElementById('wizardEmailAddress').value.trim()) {
                alert('Email Address is required');
                return false;
            }
        }
        return true;
    }

    function fillWizardReview() {
        // Fill the review step with a summary of entered data
        const hostelName = document.getElementById('wizardHostelName').value;
        const hostelType = document.getElementById('wizardHostelType').value;
        const ownerName = document.getElementById('wizardOwnerName').value;
        const contactNumber = document.getElementById('wizardContactNumber').value;
        const emailAddress = document.getElementById('wizardEmailAddress').value;
        const address = document.getElementById('wizardFullAddress').value;
        const city = document.getElementById('wizardCity').value;
        const overview = document.getElementById('wizardOverview').value;
        const minBookingDuration = document.getElementById('wizardMinBookingDuration').value;
        const minBookingUnit = document.getElementById('wizardMinBookingUnit').value;
        const advancePayment = document.getElementById('wizardAdvancePayment').value;
        const advancePaymentUnit = document.getElementById('wizardAdvancePaymentUnit').value;
        const refundPolicy = document.getElementById('wizardRefundPolicy').value;
        const acceptingBookings = document.getElementById('wizardAcceptingBookings').value;
        const availableFrom = document.getElementById('wizardAvailableFrom').value;
        
        // Collect selected facilities
        const facilities = [];
        document.querySelectorAll('#wizardStep5 .form-check-input:checked').forEach(checkbox => {
            facilities.push(checkbox.value);
        });
        
        // Collect selected payment methods
        const paymentMethods = [];
        document.querySelectorAll('#wizardStep7 .form-check-input:checked').forEach(checkbox => {
            paymentMethods.push(checkbox.value);
        });
        
        // Collect selected room types
        const roomTypes = Array.from(document.getElementById('wizardRoomTypes').selectedOptions).map(opt => opt.value);
        
        const reviewContent = document.getElementById('wizardReviewContent');
        if (reviewContent) {
            reviewContent.innerHTML = `
              <h5>Review Your Hostel Details</h5>
              <div class="row">
                <div class="col-md-6">
                  <h6 class="text-primary">Basic Information</h6>
                  <ul class="list-unstyled">
                    <li><strong>Name:</strong> ${hostelName}</li>
                    <li><strong>Type:</strong> ${hostelType}</li>
                    <li><strong>Owner:</strong> ${ownerName}</li>
                    <li><strong>Contact:</strong> ${contactNumber}</li>
                    <li><strong>Email:</strong> ${emailAddress}</li>
                  </ul>
                  
                  <h6 class="text-primary">Location</h6>
                  <ul class="list-unstyled">
                    <li><strong>Address:</strong> ${address}</li>
                    <li><strong>City:</strong> ${city}</li>
                  </ul>
                  
                  <h6 class="text-primary">Description</h6>
                  <p><strong>Overview:</strong> ${overview || 'Not provided'}</p>
                </div>
                
                <div class="col-md-6">
                  <h6 class="text-primary">Booking Information</h6>
                  <ul class="list-unstyled">
                    <li><strong>Min Duration:</strong> ${minBookingDuration} ${minBookingUnit}</li>
                    <li><strong>Advance Payment:</strong> ${advancePayment} ${advancePaymentUnit}</li>
                    <li><strong>Payment Methods:</strong> ${paymentMethods.join(', ') || 'None selected'}</li>
                    <li><strong>Refund Policy:</strong> ${refundPolicy || 'Not provided'}</li>
                  </ul>
                  
                  <h6 class="text-primary">Availability</h6>
                  <ul class="list-unstyled">
                    <li><strong>Accepting Bookings:</strong> ${acceptingBookings || 'Not specified'}</li>
                    <li><strong>Available From:</strong> ${availableFrom || 'Not specified'}</li>
                  </ul>
                  
                  <h6 class="text-primary">Room Types</h6>
                  <p>${roomTypes.join(', ') || 'None selected'}</p>
                  
                  <h6 class="text-primary">Facilities</h6>
                  <p>${facilities.join(', ') || 'None selected'}</p>
                </div>
              </div>
            `;
        }
    }

    function updateRoomInputs() {
        const selectedRoomTypes = Array.from(document.getElementById('wizardRoomTypes').selectedOptions).map(opt => opt.value);
        const container = document.getElementById('wizardDynamicRoomInputs');
        
        if (!container) return;
        
        // Clear existing inputs
        container.innerHTML = '';
        
        if (selectedRoomTypes.length === 0) {
            // Hide the container when no room types are selected
            container.classList.add('d-none');
            return;
        }
        
        // Show the container when room types are selected
        container.classList.remove('d-none');
        
        // Create input fields for each selected room type
        selectedRoomTypes.forEach((roomType, index) => {
            const roomDiv = document.createElement('div');
            roomDiv.className = 'card mb-3';
            roomDiv.innerHTML = `
                <div class="card-header">
                    <h6 class="mb-0">${roomType}</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Price per Month</label>
                            <input type="number" class="form-control" id="room_price_${index}" placeholder="Enter price" min="0" step="0.01">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Number of Available Rooms</label>
                            <input type="number" class="form-control" id="room_availability_${index}" placeholder="Enter count" min="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Furnishing Details</label>
                            <textarea class="form-control" id="room_furnishing_${index}" rows="2" placeholder="e.g., Bed, Wardrobe, Study Table, Chair"></textarea>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(roomDiv);
        });
    }

    // Initialize wizard functionality
    function initializeWizard() {
        // Add event listener for room types selection
        const roomTypesSelect = document.getElementById('wizardRoomTypes');
        if (roomTypesSelect) {
            roomTypesSelect.addEventListener('change', function() {
                updateRoomInputs();
            });
        }
        
        // Add event listeners for wizard buttons
        const wizardNextBtn = document.getElementById('wizardNextBtn');
        if (wizardNextBtn) {
            wizardNextBtn.addEventListener('click', function() {
                wizardNextStep();
            });
        }
        
        const wizardPrevBtn = document.getElementById('wizardPrevBtn');
        if (wizardPrevBtn) {
            wizardPrevBtn.addEventListener('click', function() {
                wizardPrevStep();
            });
        }
        
        const wizardClearBtn = document.getElementById('wizardClearBtn');
        if (wizardClearBtn) {
            wizardClearBtn.addEventListener('click', function() {
                wizardClear();
            });
        }
        
        const wizardExitBtn = document.getElementById('wizardExitBtn');
        if (wizardExitBtn) {
            wizardExitBtn.addEventListener('click', function() {
                exitWizard();
            });
        }
        
        // Add event listeners for photo uploads
        const photoInputs = ['wizardFrontView', 'wizardRoomsPhotos', 'wizardBathrooms', 'wizardCommonAreas'];
        photoInputs.forEach(inputId => {
            const input = document.getElementById(inputId);
            if (input) {
                input.addEventListener('change', function() {
                    const isMultiple = input.hasAttribute('multiple');
                    const previewId = inputId + 'Preview';
                    previewWizardImage(this, previewId, isMultiple);
                });
            }
        });
        
        // Initialize first step
        showWizardStep(1);
    }

    // Photo preview function for wizard
    function previewWizardImage(input, previewId, isMultiple) {
        const preview = document.getElementById(previewId);
        if (!preview) return;
        
        preview.innerHTML = ''; // Clear existing preview

        if (input.files && input.files.length > 0) {
            preview.classList.remove('picture-box-placeholder');
            if (isMultiple) {
                Array.from(input.files).forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.maxWidth = '100px';
                    img.style.margin = '5px';
                    img.style.borderRadius = '4px';
                    preview.appendChild(img);
                });
            } else {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(input.files[0]);
                img.style.maxWidth = '100%';
                img.style.maxHeight = '150px';
                img.style.borderRadius = '4px';
                preview.appendChild(img);
            }
        } else {
            preview.classList.add('picture-box-placeholder');
            preview.innerHTML = '<i class="bi bi-image fs-1"></i>';
        }
    }

    // Remove image function for wizard
    function removeWizardImage(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        
        if (input) input.value = ''; // Clear the file input
        if (preview) {
            preview.innerHTML = '<i class="bi bi-image fs-1"></i>'; // Clear the preview
            preview.classList.add('picture-box-placeholder');
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeWizard);
    } else {
        initializeWizard();
    }
})();
</script>