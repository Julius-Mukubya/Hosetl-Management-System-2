<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hostel Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php
    include "../components/hostel-admin-dashboard/global/save-confirmation-modal.php";
    include "../components/hostel-admin-dashboard/global/mobile-navbar.php";
    include "../components/hostel-admin-dashboard/global/off-canvas.php";
    include "../components/hostel-admin-dashboard/global/side-bar.php";
    ?>

    <!-- Main Content -->
    <div class="content">
        <nav class="navbar navbar-light bg-white shadow-sm mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">🏨 Hostel Listing Dashboard</span>
                <div class="d-flex align-items-center">
                    <!-- Notification Dropdown -->
                    <div class="dropdown me-3">
                        <i class="bi bi-bell fs-5" id="notificationDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false" style="cursor: pointer;">
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"
                                style="font-size: 0.5rem;">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </i>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">
                                    <div><small><strong>New Booking!</strong> Room 201 was booked.</small></div>
                                    <div class="text-muted small">5 minutes ago</div>
                                </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">
                                    <div><small><strong>Cancellation</strong> Jane Doe cancelled booking #541.</small>
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
                        <i class="bi bi-person-circle fs-3 text-primary" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;"></i>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <h6 class="dropdown-header">John Doe</h6>
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="showSection('10-profile-section')"><i class="bi bi-person me-2"></i>View Profile</a></li>
                            <li><a class="dropdown-item" href="#" onclick="showSection('11-settings-section')"><i class="bi bi-gear me-2"></i>Account Settings</a>
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

        <div id="main-content">
            <!-- Sections are dynamically loaded here-->
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        // Variables to track the current section, target section for navigation, modal instance, and section change status
        let currentSection = '01-dashboard-section';
        let targetSection = '';
        let saveModal = null;
        let sectionChanged = {};

        // Global function to show Add Hostel modal
        function showAddHostelModal() {
            console.log('Global showAddHostelModal called');
            const addHostelModal = document.getElementById('addHostelModal');
            if (addHostelModal) {
                console.log('Modal element found');
                try {
                    const modal = new bootstrap.Modal(addHostelModal);
                    
                    // Add event listeners for proper cleanup
                    addHostelModal.addEventListener('hidden.bs.modal', function() {
                        console.log('Modal hidden, cleaning up...');
                        cleanupModal();
                    });
                    
                    modal.show();
                    console.log('Modal should be showing now');
                } catch (error) {
                    console.error('Error showing modal:', error);
                    // Fallback: try to show modal manually
                    addHostelModal.classList.add('show');
                    addHostelModal.style.display = 'block';
                    document.body.classList.add('modal-open');
                    const backdrop = document.createElement('div');
                    backdrop.className = 'modal-backdrop fade show';
                    backdrop.id = 'manual-backdrop';
                    document.body.appendChild(backdrop);
                    
                    // Add manual cleanup for fallback
                    addHostelModal.addEventListener('click', function(e) {
                        if (e.target === addHostelModal) {
                            cleanupModal();
                        }
                    });
                }
            } else {
                console.error('Modal element not found');
            }
        }

        // Function to clean up modal state
        function cleanupModal() {
            console.log('Cleaning up modal state...');
            
            // Remove modal-open class from body
            document.body.classList.remove('modal-open');
            
            // Remove any manual backdrop
            const manualBackdrop = document.getElementById('manual-backdrop');
            if (manualBackdrop) {
                manualBackdrop.remove();
            }
            
            // Remove any Bootstrap backdrop
            const backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach(backdrop => backdrop.remove());
            
            // Reset any modal elements
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                modal.classList.remove('show');
                modal.style.display = 'none';
            });
            
            // Re-enable scrolling
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
        }

        // Initialize the page when DOM is loaded
        document.addEventListener("DOMContentLoaded", function() {
            showSection("01-dashboard-section"); // Show default section
            setActiveSidebar("01-dashboard-section"); // Highlight corresponding sidebar link
            saveModal = new bootstrap.Modal(document.getElementById('saveConfirmationModal')); // Initialize Bootstrap modal
            initializeChangeTracking(); // Start change tracking for form inputs

            // Set up event listeners for sidebar links
            $("#offcanvasSidebar a, .sidebar a").click(function() {
                showSection($(this).attr('data-section')); // Load clicked section
            });

            // Set up global event delegation for Add Hostel button
            document.addEventListener('click', function(e) {
                if (e.target && e.target.id === 'addHostelBtn') {
                    e.preventDefault();
                    console.log('Add Hostel button clicked via event delegation');
                    showAddHostelModal();
                }
                
                // Handle modal close button clicks
                if (e.target && (e.target.classList.contains('btn-close') || e.target.classList.contains('btn-close-white'))) {
                    console.log('Modal close button clicked');
                    setTimeout(cleanupModal, 100); // Small delay to ensure Bootstrap handles it first
                }
                
                // Handle backdrop clicks
                if (e.target && e.target.classList.contains('modal-backdrop')) {
                    console.log('Modal backdrop clicked');
                    cleanupModal();
                }
            });

            // Handle ESC key for modal closing
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    const modals = document.querySelectorAll('.modal.show');
                    if (modals.length > 0) {
                        console.log('ESC key pressed, cleaning up modals');
                        cleanupModal();
                    }
                }
            });
        });

        // Base URL for loading section files
        const baseUrl = window.location.origin;

        // Load a section file into the main content area
        function loadSection(fileName, folderpath = `${baseUrl}/hostel-management-system/components/hostel-admin-dashboard/sections/`) {
            const mainContent = $("#main-content");
            mainContent.innerHTML = ""; // Clear current content
            mainContent.load(folderpath + fileName + '.php', function() {
                // Callback after content is loaded
                console.log('Section loaded:', fileName);
                // Re-initialize any necessary functionality after content loads
                if (fileName === '01-dashboard-section') {
                    initializeDashboardSection();
                }
            }); // Load new content via jQuery

            // Close the sidebar (offcanvas) if open
            const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('offcanvasSidebar'));
            if (offcanvas) offcanvas.hide();
        }

        // Initialize dashboard section specific functionality
        function initializeDashboardSection() {
            console.log('Initializing dashboard section...');
            
            // Add event listener for Add Hostel button if it exists
            const addHostelBtn = document.getElementById('addHostelBtn');
            if (addHostelBtn) {
                console.log('Add Hostel button found in dashboard section');
                addHostelBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('Add Hostel button clicked from dashboard section');
                    showAddHostelModal();
                });
            }
        }

        // Initialize change tracking for inputs in each section
        function initializeChangeTracking() {
            document.querySelectorAll('#main-content > div').forEach(section => {
                const sectionId = section.classList[0];
                sectionChanged[sectionId] = false; // Initialize change flag

                const inputs = section.querySelectorAll('input, select, textarea');
                inputs.forEach(input => {
                    input.addEventListener('change', () => {
                        sectionChanged[sectionId] = true; // Mark as changed when input changes
                    });
                });
            });
        }
        // Display a given section and update the sidebar
        function showSection(sectionId) {
            document.getElementById("main-content").innerHTML = ""; // Clear content area
            loadSection(sectionId); // Load new section
            setActiveSidebar(sectionId); // Highlight active sidebar link
            currentSection = sectionId; // Update current section
        }

        // Set active sidebar link based on sectionId
        function setActiveSidebar(sectionId) {
            document.querySelectorAll('.sidebar a[data-section]').forEach(link => {
                link.classList.remove('active'); // Remove previous active classes
                if (link.getAttribute('data-section') === sectionId) {
                    link.classList.add('active'); // Add active class to current link
                }
            });
        }
        // Handle navigation with confirmation if unsaved changes exist
        function navigateWithModal(sectionId) {
            if (sectionChanged[currentSection]) {
                targetSection = sectionId; // Set target for navigation after confirmation
                saveModal.show(); // Show confirmation modal
            } else {
                navigateToSection(sectionId); // Navigate directly if no unsaved changes
            }
        }

        // Navigate to a section and close the sidebar if needed
        function navigateToSection(sectionId) {
            showSection(sectionId);
            setActiveSidebar(sectionId);
            const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('offcanvasSidebar'));
            if (offcanvas) offcanvas.hide(); // Close offcanvas menu
        }

        // Save current section data, hide modal, then navigate
        function saveAndProceed() {
            saveSection(currentSection); // Placeholder for actual save logic
            saveModal.hide();
            navigateToSection(targetSection);
        }
        // Proceed without saving changes, hide modal, then navigate
        function proceedWithoutSaving() {
            sectionChanged[currentSection] = false; // Reset change flag
            saveModal.hide();
            navigateToSection(targetSection);
        }

        // Save section (placeholder for future implementation)
        function saveSection(sectionId) {
            sectionChanged[sectionId] = false; // Reset change flag
            console.log(`Saving data for ${sectionId}`); // Log save operation
        }

        // Clear all form elements inside a given section
        function clearSection(sectionId) {
            const section = document.querySelector(`.${sectionId}`);
            const selects = section.querySelectorAll('select');
            const inputs = section.querySelectorAll('input');
            const dynamicRoomInputs = document.getElementById('dynamicRoomInputs');
            const errorMessages = section.querySelectorAll('.error-message');
            const checkboxes = section.querySelectorAll('.form-check-input');
            const previews = section.querySelectorAll('.picture-box, .multi-picture-box-container');
            const textareas = section.querySelectorAll('textarea');

            // Reset selects
            if (selects !== null) {
                selects.forEach(select => {
                    for (let option of select.options) {
                        option.selected = false;
                    }
                    select.selectedIndex = 0;
                });
            }

            // Clear inputs
            if (inputs !== null) {
                inputs.forEach(input => input.value = '');
            }

            // Clear previews
            previews.forEach(preview => {
                preview.innerHTML = '';
                preview.classList.add('picture-box-placeholder');
            });

            // Clear dynamic room inputs
            if (dynamicRoomInputs !== null) {
                dynamicRoomInputs.innerHTML = '';
            }

            // Uncheck all checkboxes
            if (checkboxes !== null) {
                checkboxes.forEach(cb => cb.checked = false);
            }

            // Clear error messages
            if (errorMessages !== null) {
                errorMessages.forEach(error => error.textContent = '');
            }

            // Clear textareas
            if (textareas !== null) {
                textareas.forEach(textarea => textarea.value = '');
            }
        }
    </script>

</body>

</html>