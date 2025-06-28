<!-- 05. Student Inquiries Section -->
<div class="inquiries-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Student Inquiries</h2>
                <p class="text-muted mb-0">Manage student inquiries, contact requests, and hostel information requests.</p>
            </div>
            <div>
                <button class="btn btn-success me-2" onclick="exportInquiriesData()">
                    <i class="bi bi-download me-2"></i>Export Data
                </button>
                <button class="btn btn-primary" onclick="refreshInquiriesList()">
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
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-envelope text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">New Inquiries</h6>
                                <h3 class="mb-0 fw-bold">45</h3>
                                <small class="text-primary">This week</small>
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
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-check-circle text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Responded</h6>
                                <h3 class="mb-0 fw-bold">234</h3>
                                <small class="text-success">This month</small>
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
                                <h6 class="card-title text-muted mb-1">Pending Response</h6>
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
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-telephone text-info fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Contact Requests</h6>
                                <h3 class="mb-0 fw-bold">89</h3>
                                <small class="text-info">This month</small>
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
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="inquiryStatusFilter">
                            <option value="">All Status</option>
                            <option value="new">New</option>
                            <option value="responded">Responded</option>
                            <option value="pending">Pending</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Type</label>
                        <select class="form-select" id="inquiryTypeFilter">
                            <option value="">All Types</option>
                            <option value="information">Information Request</option>
                            <option value="contact">Contact Request</option>
                            <option value="availability">Availability Check</option>
                            <option value="general">General Inquiry</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">All Hostels</label>
                        <select class="form-select" id="hostelFilter">
                            <option value="hostel1">Student Haven</option>
                            <option value="hostel2">Campus Comfort</option>
                            <option value="hostel3">University Lodge</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Date Range</label>
                        <select class="form-select" id="dateRangeFilter">
                            <option value="">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchInquiry" placeholder="Search by inquiry ID, student name, or hostel...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Inquiries Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title mb-0">Student Inquiries</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Inquiry Details</th>
                                <th>Student</th>
                                <th>Hostel</th>
                                <th>Inquiry Type</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <div class="fw-bold">#INQ-2024-001</div>
                                        <small class="text-muted">Information Request</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/32" class="rounded-circle me-2" alt="student">
                                        <div>
                                            <div class="fw-bold">Sarah Johnson</div>
                                            <small class="text-muted">sarah.johnson@student.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Student Haven</div>
                                        <small class="text-muted">Single Room</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-info">Information</span>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 200px;">
                                        "Hi, I'm interested in your single room. Can you tell me more about the facilities and monthly rates?"
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">New</span></td>
                                <td>2 hours ago</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewInquiryDetails('INQ-2024-001')">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success" onclick="respondToInquiry('INQ-2024-001')">
                                            <i class="bi bi-reply"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="forwardToHostel('INQ-2024-001')">
                                            <i class="bi bi-share"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <div class="fw-bold">#INQ-2024-002</div>
                                        <small class="text-muted">Contact Request</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/32" class="rounded-circle me-2" alt="student">
                                        <div>
                                            <div class="fw-bold">Michael Chen</div>
                                            <small class="text-muted">michael.chen@student.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Campus Comfort</div>
                                        <small class="text-muted">Shared Room</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-warning">Contact</span>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 200px;">
                                        "I'd like to schedule a visit to see the shared room facilities. When would be a good time?"
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Responded</span></td>
                                <td>1 day ago</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewInquiryDetails('INQ-2024-002')">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success" onclick="respondToInquiry('INQ-2024-002')">
                                            <i class="bi bi-reply"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="forwardToHostel('INQ-2024-002')">
                                            <i class="bi bi-share"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <div class="fw-bold">#INQ-2024-003</div>
                                        <small class="text-muted">Availability Check</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/32" class="rounded-circle me-2" alt="student">
                                        <div>
                                            <div class="fw-bold">Emma Wilson</div>
                                            <small class="text-muted">emma.wilson@student.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">University Lodge</div>
                                        <small class="text-muted">Studio Apartment</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">Availability</span>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 200px;">
                                        "Do you have any studio apartments available for the next semester starting in September?"
                                    </div>
                                </td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>3 days ago</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewInquiryDetails('INQ-2024-003')">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success" onclick="respondToInquiry('INQ-2024-003')">
                                            <i class="bi bi-reply"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="forwardToHostel('INQ-2024-003')">
                                            <i class="bi bi-share"></i>
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
                        <small class="text-muted">Showing 1-3 of 234 inquiries</small>
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
            <button class="btn btn-secondary" onclick="navigateWithModal('04-students')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('06-reports')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<script>
// Filter functionality
document.getElementById('inquiryStatusFilter').addEventListener('change', filterInquiries);
document.getElementById('inquiryTypeFilter').addEventListener('change', filterInquiries);
document.getElementById('hostelFilter').addEventListener('change', filterInquiries);
document.getElementById('dateRangeFilter').addEventListener('change', filterInquiries);
document.getElementById('searchInquiry').addEventListener('input', filterInquiries);

function filterInquiries() {
    // Implementation for filtering inquiries
    console.log('Filtering inquiries...');
    // Here you would typically make an AJAX call to filter the data
}

function refreshInquiriesList() {
    // Implementation for refreshing the inquiries list
    console.log('Refreshing inquiries list...');
    alert('Inquiries list refreshed successfully!');
}

function exportInquiriesData() {
    // Implementation for exporting inquiries data
    console.log('Exporting inquiries data...');
    alert('Inquiries data exported successfully!');
}

function viewInquiryDetails(inquiryId) {
    console.log('Viewing inquiry details:', inquiryId);
    // Here you would typically open a modal or navigate to a details page
    alert('Opening inquiry details for ID: ' + inquiryId);
}

function respondToInquiry(inquiryId) {
    console.log('Responding to inquiry:', inquiryId);
    // Here you would typically open a response form
    alert('Opening response form for inquiry ID: ' + inquiryId);
}

function forwardToHostel(inquiryId) {
    if (confirm('Are you sure you want to forward this inquiry to the hostel owner?')) {
        console.log('Forwarding inquiry to hostel:', inquiryId);
        alert('Inquiry forwarded to hostel owner successfully!');
        // Here you would typically make an AJAX call to forward the inquiry
    }
}
</script> 