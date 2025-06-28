<!--2. Basic Details Section -->
<div class="basic-info-section container mt-4">
    <div class="d-flex align-items-center mb-3">
        <label class="form-label mb-0 me-2">Select Hostel:</label>
        <!-- Dynamic dropdown populated from database -->
        <select class="form-control d-inline-block w-auto" id="selectHostel" onchange="fetchHostelDetails(this.value)">
            <option value="" selected disabled>Select Hostel</option>
            <?php
            // Populate dropdown with hostels from database
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
            <i class="bi bi-person-lines-fill text-primary fs-4"></i>
            <h4 class="mb-0 fw-semibold">1. Basic Details</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Hostel Name</label>
                        <input type="text" class="form-control" id="hostelName">
                        <div class="error-message text-danger" id="hostelNameError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Type of Hostel</label>
                        <select class="form-select" id="hostelType">
                            <option value="" selected disabled>--Select Hostel Type --</option>
                            <option value="Mixed">Mixed</option>
                            <option value="Boys">Boys</option>
                            <option value="Girls">Girls</option>
                        </select>
                        <div class="error-message text-danger" id="hostelTypeError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Owner Name</label>
                        <input type="text" class="form-control" id="ownerName">
                        <div class="error-message text-danger" id="ownerNameError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber">
                        <div class="error-message text-danger" id="contactNumberError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress">
                        <div class="error-message text-danger" id="emailAddressError"></div>
                    </div>
                </div>
                <div class="action-buttons mt-4">
                    <button type="button" class="btn btn-primary d-flex align-items-center gap-1" onclick="validateAndSaveBasicInfoSection('basic-info-section')">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-secondary d-flex align-items-center gap-1" onclick="clearSection('basic-info-section')">
                        <i class="bi bi-x-circle"></i> Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary d-flex align-items-center gap-1" onclick="navigateWithModal('01-dashboard-section')">
                <i class="bi bi-arrow-left"></i> Previous
            </button>
            <button class="btn btn-primary d-flex align-items-center gap-1" onclick="navigateWithModal('03-location-section')">
                <i class="bi bi-arrow-right"></i> Next
            </button>
        </div>
    </div>
</div>

<script>
// Fetch hostel details and populate form fields
function fetchHostelDetails(hostelId) {
    if (!hostelId) return; // Do nothing if no hostel is selected

    // Clear existing error messages
    const section = document.querySelector(".basic-info-section")
    section.querySelectorAll('.error-message').forEach(el => el.textContent = '');

    

    // Fetch hostel details from the AJAX endpoint
    fetch('../includes/get_hosteldetails.php?id=' + encodeURIComponent(hostelId))
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Populate form fields with fetched data
                document.getElementById('hostelName').value = data.hostel.name;
                document.getElementById('hostelType').value = data.hostel.type;
                document.getElementById('ownerName').value = data.hostel.owner_name;
                document.getElementById('contactNumber').value = data.hostel.contact_number;
                document.getElementById('emailAddress').value = data.hostel.email;
            } else {
                // Handle errors or show a message if hostel not found
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            // Handle network or server errors
            alert('Network or server error: ' + error);
        });
}

// Validation and saving functions remain unchanged
function validateAndSaveBasicInfoSection(sectionId) {
        // Clear previous error messages
        const section = document.querySelector(".basic-info-section")
        section.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Get form elements
        const hostelName = document.getElementById('hostelName').value.trim();
        const hostelType = document.getElementById('hostelType').value;
        const ownerName = document.getElementById('ownerName').value.trim();
        const contactNumber = document.getElementById('contactNumber').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();

        // Validation patterns
        const phonePattern = /^\+?[\d\s-]{10,}$/;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Track validation status
        let isValid = true;

        // Validation checks
        if (!hostelName) {
            document.getElementById('hostelNameError').textContent = "Hostel Name is required";
            isValid = false;
        }

        if (hostelType === "") {
            document.getElementById('hostelTypeError').textContent = "Please select a Hostel Type";
            isValid = false;
        }

        if (!ownerName) {
            document.getElementById('ownerNameError').textContent = "Owner Name is required";
            isValid = false;
        }

        if (!contactNumber) {
            document.getElementById('contactNumberError').textContent = "Contact Number is required";
            isValid = false;
        } else if (!phonePattern.test(contactNumber)) {
            document.getElementById('contactNumberError').textContent = "Please enter a valid phone number";
            isValid = false;
        }

        if (!emailAddress) {
            document.getElementById('emailAddressError').textContent = "Email Address is required";
            isValid = false;
        } else if (!emailPattern.test(emailAddress)) {
            document.getElementById('emailAddressError').textContent = "Please enter a valid email address";
            isValid = false;
        }

        // Proceed with save if all validations pass
        if (isValid) {
            saveSection(sectionId);
        }
    }

    //fucntion to save data to the database
    function saveSection() {
        // Collect values from form fields
        const hostelName = document.getElementById('hostelName').value.trim();
        const hostelType = document.getElementById('hostelType').value;
        const ownerName = document.getElementById('ownerName').value.trim();
        const contactNumber = document.getElementById('contactNumber').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();

        // Sending data to PHP while using fetch
        fetch('../includes/save_basic_info.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    hostelName,
                    hostelType,
                    ownerName,
                    contactNumber,
                    emailAddress
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Saved successfully!');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                alert('Network or server error: ' + error);
            });
    }
</script>