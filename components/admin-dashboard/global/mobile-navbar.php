<!-- Mobile Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm d-md-none">
    <div class="container-fluid">
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand mb-0 h1">🏢 Main Admin</span>
        <div class="d-flex align-items-center">
            <!-- Notification Dropdown -->
            <div class="dropdown me-2">
                <i class="bi bi-bell fs-5" id="mobileNotificationDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false" style="cursor: pointer;">
                    <span
                        class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"
                        style="font-size: 0.5rem;">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </i>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="mobileNotificationDropdown">
                    <li>
                        <h6 class="dropdown-header">Notifications</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">
                            <div><small><strong>New Hostel!</strong> Sunshine Hostel submitted for approval.</small></div>
                            <div class="text-muted small">10 minutes ago</div>
                        </a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">
                            <div><small><strong>Payment</strong> Commission received from City Hostel.</small>
                            </div>
                            <div class="text-muted small">1 hour ago</div>
                        </a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-center" href="#">View All Notifications</a></li>
                </ul>
            </div>

            <!-- Profile Dropdown -->
            <div class="dropdown">
                <img src="https://via.placeholder.com/30" class="rounded-circle" alt="admin" id="mobileProfileDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;" />
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="mobileProfileDropdown">
                    <li>
                        <h6 class="dropdown-header">Super Admin</h6>
                    </li>
                    <li><a class="dropdown-item" href="#" onclick="showSection('11-admin-profile')"><i class="bi bi-person me-2"></i>View Profile</a></li>
                    <li><a class="dropdown-item" href="#" onclick="showSection('12-admin-settings')"><i class="bi bi-gear me-2"></i>Account Settings</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav> 