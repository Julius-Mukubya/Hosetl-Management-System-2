<!-- 02. Hostels Management Section -->
<div class="hostels-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Manage Hostels</h2>
                <p class="text-muted mb-0">Review and manage all hostel listings on the platform.</p>
            </div>
            <div>
                <button class="btn btn-success me-2" onclick="exportHostelsData()">
                    <i class="bi bi-download me-2"></i>Export Data
                </button>
                <button class="btn btn-primary" onclick="refreshHostelsList()">
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
                                <h6 class="card-title text-muted mb-1">Active Hostels</h6>
                                <h3 class="mb-0 fw-bold">198</h3>
                                <small class="text-success">+5 this week</small>
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
                                <h3 class="mb-0 fw-bold">23</h3>
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
                                <h6 class="card-title text-muted mb-1">Rejected</h6>
                                <h3 class="mb-0 fw-bold">12</h3>
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
                                    <i class="bi bi-pause-circle text-info fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Suspended</h6>
                                <h3 class="mb-0 fw-bold">8</h3>
                                <small class="text-info">Temporarily disabled</small>
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
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending Approval</option>
                            <option value="rejected">Rejected</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Location</label>
                        <select class="form-select" id="locationFilter">
                            <option value="">All Locations</option>
                            <option value="nairobi">Nairobi</option>
                            <option value="mombasa">Mombasa</option>
                            <option value="kisumu">Kisumu</option>
                            <option value="nakuru">Nakuru</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Type</label>
                        <select class="form-select" id="typeFilter">
                            <option value="">All Types</option>
                            <option value="mixed">Mixed</option>
                            <option value="boys">Boys</option>
                            <option value="girls">Girls</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchHostel" placeholder="Search hostels...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hostels Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title mb-0">Hostel Listings</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Hostel Name</th>
                                <th>Owner</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Rooms</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded me-3" alt="hostel">
                                        <div>
                                            <h6 class="mb-0">Sunshine Hostel</h6>
                                            <small class="text-muted">Submitted 2 hours ago</small>
                                        </div>
                                    </div>
                                </td>
                                <td>John Smith</td>
                                <td>Nairobi</td>
                                <td>Mixed</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>15</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <span>4.2</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-success" onclick="approveHostel(1)">
                                            <i class="bi bi-check"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="rejectHostel(1)">
                                            <i class="bi bi-x"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewHostelDetails(1)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded me-3" alt="hostel">
                                        <div>
                                            <h6 class="mb-0">City View Hostel</h6>
                                            <small class="text-muted">Active since Jan 2024</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Mary Johnson</td>
                                <td>Mombasa</td>
                                <td>Girls</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>25</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <span>4.5</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-warning" onclick="suspendHostel(2)">
                                            <i class="bi bi-pause"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewHostelDetails(2)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="editHostel(2)">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded me-3" alt="hostel">
                                        <div>
                                            <h6 class="mb-0">Student Haven</h6>
                                            <small class="text-muted">Rejected 1 day ago</small>
                                        </div>
                                    </div>
                                </td>
                                <td>David Wilson</td>
                                <td>Kisumu</td>
                                <td>Boys</td>
                                <td><span class="badge bg-danger">Rejected</span></td>
                                <td>12</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <span>3.8</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-success" onclick="approveHostel(3)">
                                            <i class="bi bi-check"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewHostelDetails(3)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteHostel(3)">
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
                        <small class="text-muted">Showing 1-3 of 247 hostels</small>
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
            <button class="btn btn-secondary" onclick="navigateWithModal('01-dashboard-overview')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('03-owners')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<script>
// Filter functionality
document.getElementById('statusFilter').addEventListener('change', filterHostels);
document.getElementById('locationFilter').addEventListener('change', filterHostels);
document.getElementById('typeFilter').addEventListener('change', filterHostels);
document.getElementById('searchHostel').addEventListener('input', filterHostels);

function filterHostels() {
    // Implementation for filtering hostels
    console.log('Filtering hostels...');
    // Here you would typically make an AJAX call to filter the data
}

function refreshHostelsList() {
    // Implementation for refreshing the hostels list
    console.log('Refreshing hostels list...');
    alert('Hostels list refreshed successfully!');
}

function exportHostelsData() {
    // Implementation for exporting hostels data
    console.log('Exporting hostels data...');
    alert('Hostels data exported successfully!');
}

function approveHostel(hostelId) {
    if (confirm('Are you sure you want to approve this hostel?')) {
        console.log('Approving hostel:', hostelId);
        alert('Hostel approved successfully!');
        // Here you would typically make an AJAX call to approve the hostel
    }
}

function rejectHostel(hostelId) {
    const reason = prompt('Please provide a reason for rejection:');
    if (reason) {
        console.log('Rejecting hostel:', hostelId, 'Reason:', reason);
        alert('Hostel rejected successfully!');
        // Here you would typically make an AJAX call to reject the hostel
    }
}

function suspendHostel(hostelId) {
    if (confirm('Are you sure you want to suspend this hostel?')) {
        console.log('Suspending hostel:', hostelId);
        alert('Hostel suspended successfully!');
        // Here you would typically make an AJAX call to suspend the hostel
    }
}

function viewHostelDetails(hostelId) {
    console.log('Viewing hostel details:', hostelId);
    // Here you would typically open a modal or navigate to a details page
    alert('Opening hostel details for ID: ' + hostelId);
}

function editHostel(hostelId) {
    console.log('Editing hostel:', hostelId);
    // Here you would typically open an edit form
    alert('Opening edit form for hostel ID: ' + hostelId);
}

function deleteHostel(hostelId) {
    if (confirm('Are you sure you want to permanently delete this hostel? This action cannot be undone.')) {
        console.log('Deleting hostel:', hostelId);
        alert('Hostel deleted successfully!');
        // Here you would typically make an AJAX call to delete the hostel
    }
}
</script> 