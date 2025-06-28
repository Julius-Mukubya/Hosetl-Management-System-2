<!-- 10. Profile Section -->
<div class="profile-section">
    <div class="form-section">
        <h4>User Profile</h4>
        <div class="row g-3">
            <!-- Profile Picture -->
            <div class="col-12 text-center">
                <img src="https://via.placeholder.com/100" class="rounded-circle mb-2" alt="user profile"
                    id="profilePicturePreview" style="width: 100px; height: 100px; object-fit: cover;">
                <div>
                    <input type="file" id="profilePictureInput" style="display: none;" accept="image/*">
                    <button class="btn btn-sm btn-primary" onclick="document.getElementById('profilePictureInput').click()">Change Picture</button>
                </div>
                 <div class="error-message text-danger" id="profilePictureError"></div>
            </div>

            <!-- Profile Information -->
            <div class="col-md-6">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" value="John Doe">
                 <div class="error-message text-danger" id="fullNameError"></div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" id="emailAddressProfile" value="johndoe@example.com">
                 <div class="error-message text-danger" id="emailAddressProfileError"></div>
            </div>
             <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" value="+1234567890">
                 <div class="error-message text-danger" id="phoneNumberError"></div>
            </div>
             <div class="col-md-6">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" id="userRole" value="Hostel Manager" disabled>
            </div>
        </div>

        <div class="action-buttons mt-4">
            <button class="btn btn-primary" onclick="validateAndSaveProfile()"><i class="bi bi-save me-1"></i> Save Changes</button>
        </div>
    </div>
     <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal('01-dashboard-section')"><i
                    class="bi bi-arrow-left me-1"></i> Back to Dashboard</button>
        </div>
    </div>
</div>

<script>
document.getElementById('profilePictureInput').addEventListener('change', function(event) {
    const [file] = event.target.files;
    if (file) {
        document.getElementById('profilePicturePreview').src = URL.createObjectURL(file);
    }
});

function validateAndSaveProfile() {
    // Basic validation logic (can be expanded)
    let isValid = true;
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('emailAddressProfile').value;

    if (fullName.trim() === '') {
        document.getElementById('fullNameError').textContent = 'Full Name is required.';
        isValid = false;
    } else {
         document.getElementById('fullNameError').textContent = '';
    }

    if (email.trim() === '') {
        document.getElementById('emailAddressProfileError').textContent = 'Email is required.';
        isValid = false;
    } else {
        document.getElementById('emailAddressProfileError').textContent = '';
    }

    if(isValid) {
        // Here you would typically send the data to a save script
        // For now, we'll just show a success message
        alert('Profile updated successfully!');
        sectionChanged['10-profile-section'] = false; // Reset change tracker
    }
}
</script> 