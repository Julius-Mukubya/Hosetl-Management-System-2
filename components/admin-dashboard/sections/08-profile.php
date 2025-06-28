<!-- 08. Profile Section -->
<div class="profile-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">My Profile</h2>
                <p class="text-muted mb-0">View and manage your personal information and account details.</p>
            </div>
            <div>
                <button class="btn btn-primary" onclick="saveProfile()">
                    <i class="bi bi-check-circle me-2"></i>Save Changes
                </button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Profile Information -->
            <div class="col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" value="John" id="firstName">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="Admin" id="lastName">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" value="john.admin@hostelmanagement.com" id="email">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" value="+254 700 123 456" id="phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Job Title</label>
                                <input type="text" class="form-control" value="System Administrator" id="jobTitle">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Department</label>
                                <input type="text" class="form-control" value="IT Management" id="department">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" rows="4" id="bio">Experienced system administrator with over 5 years of experience in managing hostel management platforms and ensuring smooth operations.</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Contact Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" value="123 Admin Street" id="address">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" value="Nairobi" id="city">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State/Province</label>
                                <input type="text" class="form-control" value="Nairobi County" id="state">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Postal Code</label>
                                <input type="text" class="form-control" value="00100" id="postalCode">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <select class="form-select" id="country">
                                    <option value="Kenya" selected>Kenya</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Rwanda">Rwanda</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Emergency Contact</label>
                                <input type="tel" class="form-control" value="+254 700 987 654" id="emergencyContact">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Picture and Quick Info -->
            <div class="col-xl-4">
                <!-- Profile Picture -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Profile Picture</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Profile Picture" id="profilePicture" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="profilePictureUpload" accept="image/*">
                            <small class="text-muted">Recommended size: 300x300px</small>
                        </div>
                        <button class="btn btn-outline-primary btn-sm" onclick="removeProfilePicture()">
                            <i class="bi bi-trash me-1"></i>Remove Picture
                        </button>
                    </div>
                </div>

                <!-- Account Information -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Account Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" value="john.admin" readonly>
                            <small class="text-muted">Username cannot be changed</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" value="Super Administrator" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Member Since</label>
                            <input type="text" class="form-control" value="January 15, 2024" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Login</label>
                            <input type="text" class="form-control" value="Today at 2:30 PM" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account Status</label>
                            <input type="text" class="form-control" value="Active" readonly>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" onclick="navigateWithModal('09-settings')">
                                <i class="bi bi-gear me-2"></i>Account Settings
                            </button>
                            <button class="btn btn-outline-info" onclick="downloadProfileData()">
                                <i class="bi bi-download me-2"></i>Download My Data
                            </button>
                            <button class="btn btn-outline-warning" onclick="exportActivityLog()">
                                <i class="bi bi-clock-history me-2"></i>Activity Log
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Container -->
    <div class="navigation-container mt-4">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal('07-settings')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('09-settings')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<script>
function saveProfile() {
    console.log('Saving profile changes...');
    alert('Profile updated successfully!');
    // Here you would typically make an AJAX call to save the profile data
}

function removeProfilePicture() {
    if (confirm('Are you sure you want to remove your profile picture?')) {
        document.getElementById('profilePicture').src = 'https://via.placeholder.com/150';
        document.getElementById('profilePictureUpload').value = '';
        console.log('Profile picture removed');
        alert('Profile picture removed successfully!');
    }
}

function downloadProfileData() {
    console.log('Downloading profile data...');
    alert('Profile data download started!');
    // Here you would typically generate and download the user's data
}

function exportActivityLog() {
    console.log('Exporting activity log...');
    alert('Activity log export started!');
    // Here you would typically generate and download the activity log
}

// Handle profile picture upload
document.getElementById('profilePictureUpload').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profilePicture').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script> 