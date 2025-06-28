<!-- 04. Students Management Section -->
<div class="students-section">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Students</h2>
                <p class="text-muted mb-0">Manage all student registrations and accounts on the platform.</p>
            </div>
            <div>
                <button class="btn btn-success me-2" onclick="exportStudentsData()">
                    <i class="bi bi-download me-2"></i>Export Data
                </button>
                <button class="btn btn-primary" onclick="refreshStudentsList()">
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
                                <h6 class="card-title text-muted mb-1">Active Students</h6>
                                <h3 class="mb-0 fw-bold">1,847</h3>
                                <small class="text-success">+89 this month</small>
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
                                    <i class="bi bi-person-plus text-info fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">New Registrations</h6>
                                <h3 class="mb-0 fw-bold">45</h3>
                                <small class="text-info">This week</small>
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
                                <h6 class="card-title text-muted mb-1">Suspended</h6>
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
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-calendar-check text-warning fs-4"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="card-title text-muted mb-1">Total Bookings</h6>
                                <h3 class="mb-0 fw-bold">3,421</h3>
                                <small class="text-warning">Across all students</small>
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
                        <select class="form-select" id="studentStatusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="suspended">Suspended</option>
                            <option value="inactive">Inactive</option>
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
                        <label class="form-label">Registration Date</label>
                        <select class="form-select" id="registrationFilter">
                            <option value="">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchStudent" placeholder="Search students...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Students Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title mb-0">Student Registrations</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Student Details</th>
                                <th>University Info</th>
                                <th>Contact</th>
                                <th>Bookings</th>
                                <th>Status</th>
                                <th>Registration Date</th>
                                <th>Last Login</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="student">
                                        <div>
                                            <h6 class="mb-0">Sarah Johnson</h6>
                                            <small class="text-muted">sarah.johnson@student.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">University of Nairobi</div>
                                        <small class="text-muted">Computer Science, Year 2</small>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div>+254 700 123 456</div>
                                        <small class="text-muted">sarah.johnson@student.edu</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">5 Bookings</span>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>2 days ago</td>
                                <td>1 hour ago</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-warning" onclick="suspendStudent(1)">
                                            <i class="bi bi-pause"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewStudentDetails(1)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="editStudent(1)">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="student">
                                        <div>
                                            <h6 class="mb-0">Michael Chen</h6>
                                            <small class="text-muted">michael.chen@student.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">JKUAT</div>
                                        <small class="text-muted">Engineering, Year 3</small>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div>+254 700 234 567</div>
                                        <small class="text-muted">michael.chen@student.edu</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">8 Bookings</span>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>Mar 15, 2024</td>
                                <td>3 hours ago</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-warning" onclick="suspendStudent(2)">
                                            <i class="bi bi-pause"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewStudentDetails(2)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="editStudent(2)">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="student">
                                        <div>
                                            <h6 class="mb-0">Emma Wilson</h6>
                                            <small class="text-muted">emma.wilson@student.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-bold">Kenyatta University</div>
                                        <small class="text-muted">Business, Year 1</small>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div>+254 700 345 678</div>
                                        <small class="text-muted">emma.wilson@student.edu</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">2 Bookings</span>
                                </td>
                                <td><span class="badge bg-danger">Suspended</span></td>
                                <td>Feb 20, 2024</td>
                                <td>1 week ago</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-success" onclick="activateStudent(3)">
                                            <i class="bi bi-play"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewStudentDetails(3)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="deleteStudent(3)">
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
                        <small class="text-muted">Showing 1-3 of 1,847 students</small>
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
            <button class="btn btn-secondary" onclick="navigateWithModal('03-owners')"><i
                    class="bi bi-arrow-left me-1"></i> Previous</button>
            <button class="btn btn-primary" onclick="navigateWithModal('05-bookings')"><i
                    class="bi bi-arrow-right me-1"></i> Next</button>
        </div>
    </div>
</div>

<script>
// Filter functionality
document.getElementById('studentStatusFilter').addEventListener('change', filterStudents);
document.getElementById('universityFilter').addEventListener('change', filterStudents);
document.getElementById('registrationFilter').addEventListener('change', filterStudents);
document.getElementById('searchStudent').addEventListener('input', filterStudents);

function filterStudents() {
    // Implementation for filtering students
    console.log('Filtering students...');
    // Here you would typically make an AJAX call to filter the data
}

function refreshStudentsList() {
    // Implementation for refreshing the students list
    console.log('Refreshing students list...');
    alert('Students list refreshed successfully!');
}

function exportStudentsData() {
    // Implementation for exporting students data
    console.log('Exporting students data...');
    alert('Students data exported successfully!');
}

function suspendStudent(studentId) {
    const reason = prompt('Please provide a reason for suspension:');
    if (reason) {
        console.log('Suspending student:', studentId, 'Reason:', reason);
        alert('Student suspended successfully!');
        // Here you would typically make an AJAX call to suspend the student
    }
}

function activateStudent(studentId) {
    if (confirm('Are you sure you want to activate this student?')) {
        console.log('Activating student:', studentId);
        alert('Student activated successfully!');
        // Here you would typically make an AJAX call to activate the student
    }
}

function viewStudentDetails(studentId) {
    console.log('Viewing student details:', studentId);
    // Here you would typically open a modal or navigate to a details page
    alert('Opening student details for ID: ' + studentId);
}

function editStudent(studentId) {
    console.log('Editing student:', studentId);
    // Here you would typically open an edit form
    alert('Opening edit form for student ID: ' + studentId);
}

function deleteStudent(studentId) {
    if (confirm('Are you sure you want to permanently delete this student? This action cannot be undone.')) {
        console.log('Deleting student:', studentId);
        alert('Student deleted successfully!');
        // Here you would typically make an AJAX call to delete the student
    }
}
</script> 