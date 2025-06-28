<!-- 01. Dashboard Overview Section -->
<div class="dashboard-overview-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Dashboard Overview</h2>
                <p class="text-muted mb-0">Welcome back, Super Admin! Here's what's happening today.</p>
            </div>
            <div>
                <button class="btn btn-primary" onclick="refreshDashboard()">
                    <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                </button>
            </div>
        </div>

        <!-- Key Statistics Cards -->
        <div class="row g-4 mb-4">
            <!-- Total Hostels -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-building text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Total Hostels</h6>
                                <h3 class="mb-0 fw-bold">247</h3>
                                <small class="text-success">
                                    <i class="bi bi-arrow-up me-1"></i>+12 this month
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Students -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-mortarboard text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Total Students</h6>
                                <h3 class="mb-0 fw-bold">1,847</h3>
                                <small class="text-success">
                                    <i class="bi bi-arrow-up me-1"></i>+89 this month
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Bookings -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-calendar-check text-warning fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Total Bookings</h6>
                                <h3 class="mb-0 fw-bold">3,421</h3>
                                <small class="text-success">
                                    <i class="bi bi-arrow-up me-1"></i>+156 this month
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-danger bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-clock text-danger fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Pending Approvals</h6>
                                <h3 class="mb-0 fw-bold">23</h3>
                                <small class="text-danger">
                                    <i class="bi bi-exclamation-triangle me-1"></i>Requires attention
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Analytics Row -->
        <div class="row g-4 mb-4">
            <!-- Recent Activity -->
            <div class="col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <div class="activity-feed">
                            <div class="activity-item d-flex align-items-start mb-3">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded">
                                        <i class="bi bi-building text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">New Hostel Submission</h6>
                                    <p class="text-muted mb-1">Sunshine Hostel submitted for approval</p>
                                    <small class="text-muted">10 minutes ago</small>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="badge bg-warning">Pending</span>
                                </div>
                            </div>

                            <div class="activity-item d-flex align-items-start mb-3">
                                <div class="flex-shrink-0">
                                    <div class="bg-success bg-opacity-10 p-2 rounded">
                                        <i class="bi bi-credit-card text-success"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Payment Received</h6>
                                    <p class="text-muted mb-1">Commission received from City Hostel</p>
                                    <small class="text-muted">1 hour ago</small>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="badge bg-success">Completed</span>
                                </div>
                            </div>

                            <div class="activity-item d-flex align-items-start mb-3">
                                <div class="flex-shrink-0">
                                    <div class="bg-info bg-opacity-10 p-2 rounded">
                                        <i class="bi bi-chat-dots text-info"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Support Ticket</h6>
                                    <p class="text-muted mb-1">New support ticket from Student ID #1234</p>
                                    <small class="text-muted">2 hours ago</small>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="badge bg-info">New</span>
                                </div>
                            </div>

                            <div class="activity-item d-flex align-items-start mb-3">
                                <div class="flex-shrink-0">
                                    <div class="bg-warning bg-opacity-10 p-2 rounded">
                                        <i class="bi bi-person-plus text-warning"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">New Owner Registration</h6>
                                    <p class="text-muted mb-1">John Smith registered as hostel owner</p>
                                    <small class="text-muted">3 hours ago</small>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="badge bg-warning">Pending</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" onclick="showSection('02-hostels')">
                                <i class="bi bi-building me-2"></i>Review Hostel Submissions
                            </button>
                            <button class="btn btn-outline-success" onclick="showSection('03-owners')">
                                <i class="bi bi-people me-2"></i>Approve Owner Registrations
                            </button>
                            <button class="btn btn-outline-warning" onclick="showSection('07-messages')">
                                <i class="bi bi-chat-dots me-2"></i>View Support Tickets
                            </button>
                            <button class="btn btn-outline-info" onclick="showSection('08-reports')">
                                <i class="bi bi-graph-up me-2"></i>Generate Reports
                            </button>
                            <button class="btn btn-outline-secondary" onclick="showSection('09-content')">
                                <i class="bi bi-file-earmark-text me-2"></i>Manage Content
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Status Row -->
        <div class="row g-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">System Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                        <i class="bi bi-check-circle text-success"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Database</h6>
                                        <small class="text-success">Online</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                        <i class="bi bi-check-circle text-success"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Payment Gateway</h6>
                                        <small class="text-success">Connected</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                        <i class="bi bi-check-circle text-success"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Email Service</h6>
                                        <small class="text-success">Active</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning bg-opacity-10 p-2 rounded me-3">
                                        <i class="bi bi-exclamation-triangle text-warning"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Backup</h6>
                                        <small class="text-warning">Due in 2 hours</small>
                                    </div>
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
            <button class="btn btn-secondary" onclick="navigateWithModal('10-settings')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('02-hostels')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<script>
function refreshDashboard() {
    // Add loading state
    const refreshBtn = event.target;
    const originalText = refreshBtn.innerHTML;
    refreshBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i>Refreshing...';
    refreshBtn.disabled = true;

    // Simulate refresh delay
    setTimeout(() => {
        refreshBtn.innerHTML = originalText;
        refreshBtn.disabled = false;
        // Here you would typically reload the dashboard data
        alert('Dashboard refreshed successfully!');
    }, 2000);
}
</script> 