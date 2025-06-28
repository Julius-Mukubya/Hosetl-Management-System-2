<!-- 11. Settings Section -->
<div class="settings-section">
    <div class="form-section mb-4">
        <h4>Account Settings</h4>
        
        <!-- Change Password -->
        <h5>Change Password</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" id="currentPassword">
                 <div class="error-message text-danger" id="currentPasswordError"></div>
            </div>
            <div class="col-md-6"></div> <!-- Spacer -->
            <div class="col-md-6">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPassword">
                 <div class="error-message text-danger" id="newPasswordError"></div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmNewPassword">
                 <div class="error-message text-danger" id="confirmNewPasswordError"></div>
            </div>
        </div>

        <div class="action-buttons mt-3">
            <button class="btn btn-primary" onclick="validateAndSavePassword()"><i class="bi bi-key-fill me-1"></i> Update Password</button>
        </div>
    </div>

    <div class="form-section">
         <!-- Notification Preferences -->
        <h5 class="mt-4">Notification Preferences</h5>
         <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
            <label class="form-check-label" for="emailNotifications">Email Notifications</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="pushNotifications">
            <label class="form-check-label" for="pushNotifications">Push Notifications</label>
        </div>
         <div class="action-buttons mt-3">
            <button class="btn btn-primary" onclick="saveNotificationPreferences()"><i class="bi bi-bell-fill me-1"></i> Save Preferences</button>
        </div>
    </div>
    
     <div class="navigation-container mt-4">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal('01-dashboard-section')"><i
                    class="bi bi-arrow-left me-1"></i> Back to Dashboard</button>
        </div>
    </div>
</div>

<script>
function validateAndSavePassword() {
    // Basic validation (can be expanded)
    let isValid = true;
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmNewPassword = document.getElementById('confirmNewPassword').value;

    if (currentPassword === '') {
        document.getElementById('currentPasswordError').textContent = 'Current password is required.';
        isValid = false;
    } else {
        document.getElementById('currentPasswordError').textContent = '';
    }

    if (newPassword.length < 8) {
        document.getElementById('newPasswordError').textContent = 'New password must be at least 8 characters.';
        isValid = false;
    } else {
        document.getElementById('newPasswordError').textContent = '';
    }

    if (newPassword !== confirmNewPassword) {
        document.getElementById('confirmNewPasswordError').textContent = 'Passwords do not match.';
        isValid = false;
    } else {
        document.getElementById('confirmNewPasswordError').textContent = '';
    }

    if (isValid) {
        // Here you would send data to a script to update the password
        alert('Password updated successfully!');
    }
}

function saveNotificationPreferences() {
    // Here you would send data to a script to save preferences
    alert('Notification preferences saved!');
}
</script> 