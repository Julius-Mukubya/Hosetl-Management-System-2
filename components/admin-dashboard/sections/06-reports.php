<!-- 06. Reports & Analytics Section -->
<div class="reports-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Reports & Analytics</h2>
                <p class="text-muted mb-0">Comprehensive analytics and insights about platform usage, student engagement, and hostel performance.</p>
            </div>
            <div>
                <button class="btn btn-success me-2" onclick="exportReport()">
                    <i class="bi bi-download me-2"></i>Export Report
                </button>
                <button class="btn btn-primary" onclick="refreshReport()">
                    <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                </button>
            </div>
        </div>

        <!-- Key Metrics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-people text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Total Students</h6>
                                <h3 class="mb-0 fw-bold">2,847</h3>
                                <small class="text-primary">+12% this month</small>
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
                                    <i class="bi bi-building text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Active Hostels</h6>
                                <h3 class="mb-0 fw-bold">156</h3>
                                <small class="text-success">+5 this month</small>
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
                                    <i class="bi bi-envelope text-info fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Total Inquiries</h6>
                                <h3 class="mb-0 fw-bold">1,234</h3>
                                <small class="text-info">+23% this month</small>
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
                                    <i class="bi bi-eye text-warning fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Page Views</h6>
                                <h3 class="mb-0 fw-bold">45,678</h3>
                                <small class="text-warning">+8% this month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Filters -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Report Type</label>
                        <select class="form-select" id="reportType">
                            <option value="overview">Overview Report</option>
                            <option value="students">Student Analytics</option>
                            <option value="hostels">Hostel Performance</option>
                            <option value="inquiries">Inquiry Analytics</option>
                            <option value="engagement">User Engagement</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange">
                            <option value="7">Last 7 Days</option>
                            <option value="30" selected>Last 30 Days</option>
                            <option value="90">Last 3 Months</option>
                            <option value="365">Last Year</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">University</label>
                        <select class="form-select" id="universityFilter">
                            <option value="">All Universities</option>
                            <option value="uon">University of Nairobi</option>
                            <option value="jkuat">JKUAT</option>
                            <option value="ku">Kenyatta University</option>
                            <option value="mu">Moi University</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Export Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="pdf">PDF</option>
                            <option value="excel">Excel</option>
                            <option value="csv">CSV</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Analytics -->
        <div class="row g-4 mb-4">
            <!-- Student Registration Trend -->
            <div class="col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Student Registration Trend</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height: 300px;">
                            <canvas id="studentTrendChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inquiry Distribution -->
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Inquiry Distribution</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height: 300px;">
                            <canvas id="inquiryDistributionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Performing Hostels -->
        <div class="row g-4 mb-4">
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Top Performing Hostels</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Hostel Name</th>
                                        <th>Inquiries</th>
                                        <th>Response Rate</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Student Haven</td>
                                        <td>234</td>
                                        <td><span class="badge bg-success">98%</span></td>
                                        <td>4.8 ⭐</td>
                                    </tr>
                                    <tr>
                                        <td>Campus Comfort</td>
                                        <td>189</td>
                                        <td><span class="badge bg-success">95%</span></td>
                                        <td>4.6 ⭐</td>
                                    </tr>
                                    <tr>
                                        <td>University Lodge</td>
                                        <td>156</td>
                                        <td><span class="badge bg-warning">87%</span></td>
                                        <td>4.4 ⭐</td>
                                    </tr>
                                    <tr>
                                        <td>Student Plaza</td>
                                        <td>134</td>
                                        <td><span class="badge bg-success">92%</span></td>
                                        <td>4.5 ⭐</td>
                                    </tr>
                                    <tr>
                                        <td>Academic Residences</td>
                                        <td>98</td>
                                        <td><span class="badge bg-warning">85%</span></td>
                                        <td>4.2 ⭐</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Demographics -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Student Demographics</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="text-center">
                                    <h4 class="text-primary mb-1">65%</h4>
                                    <small class="text-muted">Female Students</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <h4 class="text-info mb-1">35%</h4>
                                    <small class="text-muted">Male Students</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <h4 class="text-success mb-1">42%</h4>
                                    <small class="text-muted">First Year</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <h4 class="text-warning mb-1">58%</h4>
                                    <small class="text-muted">Upper Years</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <h6 class="mb-2">Top Universities</h6>
                            <div class="d-flex justify-content-between mb-1">
                                <span>University of Nairobi</span>
                                <span class="text-muted">45%</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar" style="width: 45%"></div>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span>JKUAT</span>
                                <span class="text-muted">28%</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar" style="width: 28%"></div>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span>Kenyatta University</span>
                                <span class="text-muted">18%</span>
                            </div>
                            <div class="progress mb-2" style="height: 6px;">
                                <div class="progress-bar" style="width: 18%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title mb-0">Recent Platform Activity</h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">New hostel registered: "Campus View Residences"</h6>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-primary"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">50 new student registrations today</h6>
                            <small class="text-muted">4 hours ago</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-info"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">Peak inquiry time: 2:00 PM - 4:00 PM</h6>
                            <small class="text-muted">6 hours ago</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-warning"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">System maintenance completed</h6>
                            <small class="text-muted">1 day ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Container -->
    <div class="navigation-container mt-4">
        <div class="nav-buttons">
            <button class="btn btn-secondary" onclick="navigateWithModal('05-bookings')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('07-settings')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -35px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: -29px;
    top: 17px;
    width: 2px;
    height: calc(100% + 3px);
    background-color: #e9ecef;
}

.timeline-content {
    padding-left: 10px;
}
</style>

<script>
// Initialize charts when the section loads
document.addEventListener('DOMContentLoaded', function() {
    initializeCharts();
});

function initializeCharts() {
    // Student Registration Trend Chart
    const studentCtx = document.getElementById('studentTrendChart').getContext('2d');
    new Chart(studentCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Registrations',
                data: [120, 150, 180, 220, 280, 320],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Inquiry Distribution Chart
    const inquiryCtx = document.getElementById('inquiryDistributionChart').getContext('2d');
    new Chart(inquiryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Information', 'Contact', 'Availability', 'General'],
            datasets: [{
                data: [45, 25, 20, 10],
                backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107',
                    '#6c757d'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

function generateReport() {
    const reportType = document.getElementById('reportType').value;
    const dateRange = document.getElementById('dateRange').value;
    const university = document.getElementById('universityFilter').value;
    
    console.log('Generating report:', { reportType, dateRange, university });
    alert('Report generation started! You will be notified when it\'s ready.');
    // Here you would typically make an AJAX call to generate the report
}

function exportReport() {
    const format = document.getElementById('exportFormat').value;
    console.log('Exporting report in format:', format);
    alert('Report export started!');
    // Here you would typically make an AJAX call to export the report
}

// Filter functionality
document.getElementById('reportType').addEventListener('change', updateReport);
document.getElementById('dateRange').addEventListener('change', updateReport);
document.getElementById('universityFilter').addEventListener('change', updateReport);

function updateReport() {
    console.log('Updating report with new filters...');
    // Here you would typically refresh the charts and data based on new filters
}
</script> 