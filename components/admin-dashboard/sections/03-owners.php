<!-- 03. Hostel Owners Management Section -->
<div class="owners-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Hostel Owners</h2>
                <p class="text-muted mb-0">Manage all hostel owner registrations and accounts.</p>
            </div>
            <div>
                <button class="btn btn-success me-2" onclick="exportOwnersData()">
                    <i class="bi bi-download me-2"></i>Export Data
                </button>
                <button class="btn btn-primary" onclick="refreshOwnersList()">
                    <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-check-circle text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Active Owners</h6>
                                <h3 class="mb-0 fw-bold">156</h3>
                                <small class="text-success">+8 this month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-clock text-warning fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Pending Approval</h6>
                                <h3 class="mb-0 fw-bold">12</h3>
                                <small class="text-warning">Requires attention</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-danger bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-x-circle text-danger fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Banned/Suspended</h6>
                                <h3 class="mb-0 fw-bold">5</h3>
                                <small class="text-danger">This month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-building text-info fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Total Hostels</h6>
                                <h3 class="mb-0 fw-bold">247</h3>
                                <small class="text-info">Across all owners</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="ownerStatusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending Approval</option>
                            <option value="banned">Banned</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Location</label>
                        <select class="form-select" id="ownerLocationFilter">
                            <option value="">All Locations</option>
                            <option value="nairobi">Nairobi</option>
                            <option value="mombasa">Mombasa</option>
                            <option value="kisumu">Kisumu</option>
                            <option value="nakuru">Nakuru</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Verification</label>
                        <select class="form-select" id="verificationFilter">
                            <option value="">All</option>
                            <option value="verified">Verified</option>
                            <option value="unverified">Unverified</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchOwner" placeholder="Search owners...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Owners Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title mb-0">Owner Registrations</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Owner Details</th>
                                <th>Contact Info</th>
                                <th>Location</th>
                                <th>Hostels</th>
                                <th>Status</th>
                                <th>Verification</th>
                                <th>Join Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="owner">
                                        <div>
                                            <h6 class="mb-0">John Smith</h6>
                                            <small class="text-muted">john.smith@email.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div>+254 700 123 456</div>
                                        <small class="text-muted">john.smith@email.com</small>
                                    </div>
                                </td>
                                <td>Nairobi</td>
                                <td>
                                    <span class="badge bg-primary">3 Hostels</span>
                                </td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <span class="badge bg-secondary">Unverified</span>
                                </td>
                                <td>2 days ago</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-success" onclick="approveOwner(1)">
                                            <i class="bi bi-check"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="rejectOwner(1)">
                                            <i class="bi bi-x"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewOwnerDetails(1)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="owner">
                                        <div>
                                            <h6 class="mb-0">Mary Johnson</h6>
                                            <small class="text-muted">mary.johnson@email.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div>+254 700 234 567</div>
                                        <small class="text-muted">mary.johnson@email.com</small>
                                    </div>
                                </td>
                                <td>Mombasa</td>
                                <td>
                                    <span class="badge bg-primary">2 Hostels</span>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <span class="badge bg-success">Verified</span>
                                </td>
                                <td>Jan 15, 2024</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-warning" onclick="suspendOwner(2)">
                                            <i class="bi bi-pause"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewOwnerDetails(2)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="editOwner(2)">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="owner">
                                        <div>
                                            <h6 class="mb-0">David Wilson</h6>
                                            <small class="text-muted">david.wilson@email.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div>+254 700 345 678</div>
                                        <small class="text-muted">david.wilson@email.com</small>
                                    </div>
                                </td>
                                <td>Kisumu</td>
                                <td>
                                    <span class="badge bg-primary">1 Hostel</span>
                                </td>
                                <td><span class="badge bg-danger">Banned</span></td>
                                <td>
                                    <span class="badge bg-success">Verified</span>
                                </td>
                                <td>Dec 10, 2023</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-success" onclick="unbanOwner(3)">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewOwnerDetails(3)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteOwner(3)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Showing 1-3 of 156 owners</small>
                    </div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Container -->
    <div class="navigation-container mt-4">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal('02-hostels')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('04-students')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<script>
// Filter functionality
document.getElementById('ownerStatusFilter').addEventListener('change', filterOwners);
document.getElementById('ownerLocationFilter').addEventListener('change', filterOwners);
document.getElementById('verificationFilter').addEventListener('change', filterOwners);
document.getElementById('searchOwner').addEventListener('input', filterOwners);

function filterOwners() {
    // Implementation for filtering owners
    console.log('Filtering owners...');
    // Here you would typically make an AJAX call to filter the data
}

function refreshOwnersList() {
    // Implementation for refreshing the owners list
    console.log('Refreshing owners list...');
    alert('Owners list refreshed successfully!');
}

function exportOwnersData() {
    // Implementation for exporting owners data
    console.log('Exporting owners data...');
    alert('Owners data exported successfully!');
}

function approveOwner(ownerId) {
    if (confirm('Are you sure you want to approve this owner?')) {
        console.log('Approving owner:', ownerId);
        alert('Owner approved successfully!');
        // Here you would typically make an AJAX call to approve the owner
    }
}

function rejectOwner(ownerId) {
    const reason = prompt('Please provide a reason for rejection:');
    if (reason) {
        console.log('Rejecting owner:', ownerId, 'Reason:', reason);
        alert('Owner rejected successfully!');
        // Here you would typically make an AJAX call to reject the owner
    }
}

function suspendOwner(ownerId) {
    const duration = prompt('Enter suspension duration (days):');
    if (duration) {
        console.log('Suspending owner:', ownerId, 'Duration:', duration);
        alert('Owner suspended successfully!');
        // Here you would typically make an AJAX call to suspend the owner
    }
}

function unbanOwner(ownerId) {
    if (confirm('Are you sure you want to unban this owner?')) {
        console.log('Unbanning owner:', ownerId);
        alert('Owner unbanned successfully!');
        // Here you would typically make an AJAX call to unban the owner
    }
}

function viewOwnerDetails(ownerId) {
    console.log('Viewing owner details:', ownerId);
    // Here you would typically open a modal or navigate to a details page
    alert('Opening owner details for ID: ' + ownerId);
}

function editOwner(ownerId) {
    console.log('Editing owner:', ownerId);
    // Here you would typically open an edit form
    alert('Opening edit form for owner ID: ' + ownerId);
}

function deleteOwner(ownerId) {
    if (confirm('Are you sure you want to permanently delete this owner? This action cannot be undone.')) {
        console.log('Deleting owner:', ownerId);
        alert('Owner deleted successfully!');
        // Here you would typically make an AJAX call to delete the owner
    }
}
</script> 