<div class="dashboard-section container mt-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <h2 class="fw-bold mb-0"><i class="bi bi-house-door-fill me-2 text-primary"></i>Hostel Dashboard</h2>
        <div class="d-flex align-items-center gap-2">
            <label class="form-label mb-0 me-2">Select Hostel:</label>
            <select class="form-control d-inline-block w-auto me-2">
                <?php
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "hostel_system";
                $conn = new mysqli($host, $user, $pass, $db);
                if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

                $sql = "SELECT id, name FROM hostels ORDER BY name ASC";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                    }
                } else {
                    echo '<option disabled>No hostels found</option>';
                }
                $conn->close();
                ?>
            </select>
            <button class="btn btn-success d-flex align-items-center gap-1" id="addHostelBtn">
                <i class="bi bi-plus-lg"></i> Add Hostel
            </button>
        </div>
    </div>

    <!-- Simple Add Hostel Modal -->
    <div class="modal fade" id="addHostelModal" tabindex="-1" aria-labelledby="addHostelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addHostelModalLabel"><i class="bi bi-plus-circle me-2"></i>Add New Hostel</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addHostelForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Hostel Name</label>
                                <input type="text" class="form-control" id="hostelName" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Type</label>
                                <select class="form-select" id="hostelType" required>
                                    <option value="" selected disabled>--Select Hostel Type--</option>
                                    <option value="Mixed">Mixed</option>
                                    <option value="Boys">Boys</option>
                                    <option value="Girls">Girls</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Owner Name</label>
                                <input type="text" class="form-control" id="ownerName" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contactNumber" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="emailAddress" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="2" required></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Hostel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow-sm rounded-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center border-bottom-0 rounded-top-4">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-building me-2 text-primary"></i>Hostel Listings</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "hostel_system";
                        $conn = new mysqli($host, $user, $pass, $db);
                        if ($conn->connect_error) {
                            echo '<tr><td colspan="4" class="text-center text-danger">Database connection failed</td></tr>';
                        } else {
                            $sql = "SELECT id, name, city FROM hostels ORDER BY created_at DESC";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['city']) . '</td>';
                                    echo '<td><span class="badge bg-success">Active</span></td>';
                                    echo '<td>';
                                    echo '<button class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil"></i> Edit</button>';
                                    echo '<button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="4" class="text-center">No hostels found.</td></tr>';
                            }
                            $conn->close();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-4 g-3">
        <div class="col-md-4">
            <div class="card text-center shadow-sm rounded-4">
                <div class="card-body">
                    <h6 class="card-title text-muted">Average Rating</h6>
                    <p class="fs-4 mb-0 fw-bold">4.3 <i class="bi bi-star-fill text-warning"></i></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm rounded-4">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Reviews</h6>
                    <p class="fs-4 mb-0 fw-bold">124</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm rounded-4">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Inquiries</h6>
                    <p class="fs-4 mb-0 fw-bold">57</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add Hostel button functionality
    const addHostelBtn = document.getElementById('addHostelBtn');
    if (addHostelBtn) {
        addHostelBtn.addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('addHostelModal'));
            modal.show();
        });
    }

    // Form submission
    const addHostelForm = document.getElementById('addHostelForm');
    if (addHostelForm) {
        addHostelForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData();
            formData.append('hostel_name', document.getElementById('hostelName').value);
            formData.append('hostel_type', document.getElementById('hostelType').value);
            formData.append('owner_name', document.getElementById('ownerName').value);
            formData.append('contact_number', document.getElementById('contactNumber').value);
            formData.append('email', document.getElementById('emailAddress').value);
            formData.append('city', document.getElementById('city').value);
            formData.append('address', document.getElementById('address').value);

            fetch('../includes/add_hostel.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.includes('successfully')) {
                    alert('Hostel added successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + data);
                }
            })
            .catch(error => {
                alert('Network error: ' + error);
            });
        });
    }
});
</script> 