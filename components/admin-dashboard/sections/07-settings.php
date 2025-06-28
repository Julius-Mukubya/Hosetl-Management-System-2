<!-- 07. Site Settings Section -->
<div class="settings-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Site Settings</h2>
                <p class="text-muted mb-0">Configure system settings, manage user roles, and customize platform behavior.</p>
            </div>
            <div>
                <button class="btn btn-success me-2" onclick="saveAllSettings()">
                    <i class="bi bi-check-circle me-2"></i>Save All Changes
                </button>
                <button class="btn btn-secondary" onclick="resetToDefaults()">
                    <i class="bi bi-arrow-clockwise me-2"></i>Reset to Defaults
                </button>
            </div>
        </div>

        <!-- Settings Tabs -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0">
                <ul class="nav nav-tabs card-header-tabs" id="settingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">
                            <i class="bi bi-gear me-2"></i>General Settings
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab">
                            <i class="bi bi-people me-2"></i>User Management
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab">
                            <i class="bi bi-bell me-2"></i>Notifications
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">
                            <i class="bi bi-shield-check me-2"></i>Security
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="appearance-tab" data-bs-toggle="tab" data-bs-target="#appearance" type="button" role="tab">
                            <i class="bi bi-palette me-2"></i>Appearance
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="settingsTabContent">
                    <!-- General Settings Tab -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <h5 class="mb-3">Site Information</h5>
                                <div class="mb-3">
                                    <label class="form-label">Site Name</label>
                                    <input type="text" class="form-control" value="Hostel Management System" id="siteName">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Site Description</label>
                                    <textarea class="form-control" rows="3" id="siteDescription">Find the perfect student accommodation near your university campus.</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contact Email</label>
                                    <input type="email" class="form-control" value="admin@hostelmanagement.com" id="contactEmail">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contact Phone</label>
                                    <input type="tel" class="form-control" value="+254 700 123 456" id="contactPhone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-3">Platform Settings</h5>
                                <div class="mb-3">
                                    <label class="form-label">Default Language</label>
                                    <select class="form-select" id="defaultLanguage">
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
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="maintenanceMode">
                                        <label class="form-check-label" for="maintenanceMode">
                                            Maintenance Mode
                                        </label>
                                    </div>
                                    <small class="text-muted">Enable to show maintenance page to visitors</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Management Tab -->
                    <div class="tab-pane fade" id="users" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <h5 class="mb-3">Admin Users</h5>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Admin</td>
                                                <td>john@admin.com</td>
                                                <td><span class="badge bg-primary">Super Admin</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editUser(1)">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sarah Manager</td>
                                                <td>sarah@admin.com</td>
                                                <td><span class="badge bg-success">Admin</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="editUser(2)">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button class="btn btn-primary" onclick="addNewUser()">
                                    <i class="bi bi-plus me-2"></i>Add New Admin
                                </button>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-3">User Registration Settings</h5>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="allowStudentRegistration" checked>
                                        <label class="form-check-label" for="allowStudentRegistration">
                                            Allow Student Registration
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="allowHostelRegistration" checked>
                                        <label class="form-check-label" for="allowHostelRegistration">
                                            Allow Hostel Owner Registration
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailVerification" checked>
                                        <label class="form-check-label" for="emailVerification">
                                            Require Email Verification
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="adminApproval">
                                        <label class="form-check-label" for="adminApproval">
                                            Require Admin Approval for Hostels
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications" role="tabpanel">
                        <div class="row g-4">
                            <div class="col">
                                <h5 class="mb-3">Email Notifications</h5>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="newInquiryEmail" checked>
                                        <label class="form-check-label" for="newInquiryEmail">
                                            New Student Inquiry
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="newHostelEmail" checked>
                                        <label class="form-check-label" for="newHostelEmail">
                                            New Hostel Registration
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="newStudentEmail" checked>
                                        <label class="form-check-label" for="newStudentEmail">
                                            New Student Registration
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="systemAlertsEmail" checked>
                                        <label class="form-check-label" for="systemAlertsEmail">
                                            System Alerts
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <h5 class="mb-3">Password Policy</h5>
                                <div class="mb-3">
                                    <label class="form-label">Minimum Password Length</label>
                                    <input type="number" class="form-control" value="8" min="6" max="20" id="minPasswordLength">
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="requireUppercase" checked>
                                        <label class="form-check-label" for="requireUppercase">
                                            Require Uppercase Letters
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="requireNumbers" checked>
                                        <label class="form-check-label" for="requireNumbers">
                                            Require Numbers
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="requireSpecialChars">
                                        <label class="form-check-label" for="requireSpecialChars">
                                            Require Special Characters
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-3">Session & Security</h5>
                                <div class="mb-3">
                                    <label class="form-label">Session Timeout (minutes)</label>
                                    <input type="number" class="form-control" value="30" min="5" max="480" id="sessionTimeout">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Appearance Tab -->
                    <div class="tab-pane fade" id="appearance" role="tabpanel">
                        <div class="row g-4">
                            <div class="col">
                                <h5 class="mb-3">Theme Settings</h5>
                                <div class="mb-3">
                                    <label class="form-label">Primary Color</label>
                                    <input type="color" class="form-control form-control-color" value="#007bff" id="primaryColor">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Secondary Color</label>
                                    <input type="color" class="form-control form-control-color" value="#6c757d" id="secondaryColor">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Theme Mode</label>
                                    <select class="form-select" id="themeMode">
                                        <option value="light" selected>Light Mode</option>
                                        <option value="dark">Dark Mode</option>
                                        <option value="auto">Auto (System)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="siteLogo" accept="image/*">
                                    <small class="text-muted">Recommended size: 200x60px</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Container -->
    <div class="navigation-container mt-4">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal('06-reports')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
        </div>
    </div>
</div>

<script>
// Save all settings
function saveAllSettings() {
    console.log('Saving all settings...');
    alert('All settings saved successfully!');
    // Here you would typically make an AJAX call to save all settings
}

// Reset to defaults
function resetToDefaults() {
    if (confirm('Are you sure you want to reset all settings to defaults? This action cannot be undone.')) {
        console.log('Resetting settings to defaults...');
        alert('Settings reset to defaults successfully!');
        // Here you would typically make an AJAX call to reset settings
    }
}

// Add new admin user
function addNewUser() {
    console.log('Adding new admin user...');
    alert('Opening add user form...');
    // Here you would typically open a modal or navigate to add user page
}

// Edit user
function editUser(userId) {
    console.log('Editing user:', userId);
    alert('Opening edit user form for ID: ' + userId);
    // Here you would typically open a modal or navigate to edit user page
}

// Test email connection
function testEmailConnection() {
    console.log('Testing email connection...');
    alert('Email connection test completed successfully!');
    // Here you would typically make an AJAX call to test email settings
}

// Initialize settings tabs
document.addEventListener('DOMContentLoaded', function() {
    // Add change tracking for form inputs
    const inputs = document.querySelectorAll('#settingsTabContent input, #settingsTabContent select, #settingsTabContent textarea');
    inputs.forEach(input => {
        input.addEventListener('change', function() {
            console.log('Setting changed:', this.id, this.value);
            // Here you could add visual indicators for unsaved changes
        });
    });
});
</script> 