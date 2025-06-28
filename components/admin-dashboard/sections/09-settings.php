<!-- 09. Account Settings Section -->
<div class="account-settings-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Account Settings</h2>
                <p class="text-muted mb-0">Manage your password, preferences, and account security settings.</p>
            </div>
            <div>
                <button class="btn btn-primary" onclick="saveAccountSettings()">
                    <i class="bi bi-check-circle me-2"></i>Save Changes
                </button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Password Management -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Password Management</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword">
                            <div class="form-text">
                                <small class="text-muted">Password must be at least 8 characters long</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword">
                        </div>
                        <div class="mb-3">
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar" id="passwordStrength" style="width: 0%"></div>
                            </div>
                            <small class="text-muted" id="passwordStrengthText">Password strength: Weak</small>
                        </div>
                        <button class="btn btn-primary" onclick="changePassword()">
                            <i class="bi bi-key me-2"></i>Change Password
                        </button>
                    </div>
                </div>

                <!-- Security Settings -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Security Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="twoFactorAuth">
                                <label class="form-check-label" for="twoFactorAuth">
                                    Enable Two-Factor Authentication
                                </label>
                                <div class="form-text">
                                    <small class="text-muted">Add an extra layer of security to your account</small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="loginNotifications" checked>
                                <label class="form-check-label" for="loginNotifications">
                                    Login Notifications
                                </label>
                                <div class="form-text">
                                    <small class="text-muted">Get notified of new login attempts</small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sessionTimeout" checked>
                                <label class="form-check-label" for="sessionTimeout">
                                    Auto Logout on Inactivity
                                </label>
                                <div class="form-text">
                                    <small class="text-muted">Automatically log out after 30 minutes of inactivity</small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Session Timeout (minutes)</label>
                            <select class="form-select" id="sessionTimeoutMinutes">
                                <option value="15">15 minutes</option>
                                <option value="30" selected>30 minutes</option>
                                <option value="60">1 hour</option>
                                <option value="120">2 hours</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Preferences -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Preferences</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Language</label>
                            <select class="form-select" id="language">
                                <option value="en" selected>English</option>
                                <option value="sw">Swahili</option>
                                <option value="fr">French</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Time Zone</label>
                            <select class="form-select" id="timezone">
                                <option value="Africa/Nairobi" selected>Africa/Nairobi (GMT+3)</option>
                                <option value="UTC">UTC (GMT+0)</option>
                                <option value="America/New_York">America/New_York (GMT-5)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date Format</label>
                            <select class="form-select" id="dateFormat">
                                <option value="Y-m-d" selected>YYYY-MM-DD</option>
                                <option value="d/m/Y">DD/MM/YYYY</option>
                                <option value="m/d/Y">MM/DD/YYYY</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Theme</label>
                            <select class="form-select" id="theme">
                                <option value="light" selected>Light Mode</option>
                                <option value="dark">Dark Mode</option>
                                <option value="auto">Auto (System)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Items Per Page</label>
                            <select class="form-select" id="itemsPerPage">
                                <option value="10">10 items</option>
                                <option value="25" selected>25 items</option>
                                <option value="50">50 items</option>
                                <option value="100">100 items</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Notification Preferences -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Notification Preferences</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                <label class="form-check-label" for="emailNotifications">
                                    Email Notifications
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="browserNotifications" checked>
                                <label class="form-check-label" for="browserNotifications">
                                    Browser Notifications
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="newInquiryAlerts" checked>
                                <label class="form-check-label" for="newInquiryAlerts">
                                    New Inquiry Alerts
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="systemAlerts" checked>
                                <label class="form-check-label" for="systemAlerts">
                                    System Alerts
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="weeklyReports">
                                <label class="form-check-label" for="weeklyReports">
                                    Weekly Summary Reports
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Actions -->
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title mb-0">Account Actions</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <button class="btn btn-outline-info w-100" onclick="exportAccountData()">
                            <i class="bi bi-download me-2"></i>Export My Data
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-warning w-100" onclick="viewActivityLog()">
                            <i class="bi bi-clock-history me-2"></i>View Activity Log
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-danger w-100" onclick="deactivateAccount()">
                            <i class="bi bi-person-x me-2"></i>Deactivate Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Container -->
    <div class="navigation-container mt-4">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal('08-profile')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
        </div>
    </div>
</div>

<script>
function saveAccountSettings() {
    console.log('Saving account settings...');
    alert('Account settings saved successfully!');
    // Here you would typically make an AJAX call to save the settings
}

function changePassword() {
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (!currentPassword || !newPassword || !confirmPassword) {
        alert('Please fill in all password fields');
        return;
    }

    if (newPassword !== confirmPassword) {
        alert('New passwords do not match');
        return;
    }

    if (newPassword.length < 8) {
        alert('Password must be at least 8 characters long');
        return;
    }

    console.log('Changing password...');
    alert('Password changed successfully!');
    // Here you would typically make an AJAX call to change the password
    
    // Clear the password fields
    document.getElementById('currentPassword').value = '';
    document.getElementById('newPassword').value = '';
    document.getElementById('confirmPassword').value = '';
}

function exportAccountData() {
    console.log('Exporting account data...');
    alert('Account data export started!');
    // Here you would typically generate and download the user's data
}

function viewActivityLog() {
    console.log('Viewing activity log...');
    alert('Opening activity log...');
    // Here you would typically open a modal or navigate to activity log page
}

function deactivateAccount() {
    if (confirm('Are you sure you want to deactivate your account? This action can be reversed by contacting support.')) {
        console.log('Deactivating account...');
        alert('Account deactivation request submitted. You will be logged out shortly.');
        // Here you would typically make an AJAX call to deactivate the account
    }
}

// Password strength checker
document.getElementById('newPassword').addEventListener('input', function() {
    const password = this.value;
    const strengthBar = document.getElementById('passwordStrength');
    const strengthText = document.getElementById('passwordStrengthText');
    
    let strength = 0;
    let text = 'Weak';
    
    if (password.length >= 8) strength += 25;
    if (password.match(/[a-z]/)) strength += 25;
    if (password.match(/[A-Z]/)) strength += 25;
    if (password.match(/[0-9]/)) strength += 25;
    
    if (strength >= 100) {
        text = 'Strong';
        strengthBar.className = 'progress-bar bg-success';
    } else if (strength >= 75) {
        text = 'Good';
        strengthBar.className = 'progress-bar bg-warning';
    } else if (strength >= 50) {
        text = 'Fair';
        strengthBar.className = 'progress-bar bg-info';
    } else {
        text = 'Weak';
        strengthBar.className = 'progress-bar bg-danger';
    }
    
    strengthBar.style.width = strength + '%';
    strengthText.textContent = 'Password strength: ' + text;
});
</script> 