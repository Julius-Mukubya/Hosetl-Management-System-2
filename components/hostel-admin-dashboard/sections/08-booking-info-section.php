<!-- 7. Booking & Payment Info -->
<div class="booking-info-section container mt-4">
    <div class="d-flex align-items-center mb-3">
        <label class="form-label mb-0 me-2">Select Hostel:</label>
        <select class="form-control d-inline-block w-auto">
            <option>Hostel One</option>
            <option>Hostel Two</option>
            <option>Hostel Three</option>
        </select>
    </div>
    <div class="card shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white border-bottom-0 rounded-top-4 d-flex align-items-center gap-2">
            <i class="bi bi-credit-card-2-back-fill text-primary fs-4"></i>
            <h4 class="mb-0 fw-semibold">7. Booking & Payment Info</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Minimum Booking Duration</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="minBookingDuration" placeholder="e.g., 30" min="1">
                            <select class="form-select" id="minBookingUnit" style="max-width: 150px;">
                                <option selected value="Hours">Hours</option>
                                <option value="Days">Days</option>
                                <option value="Weeks">Weeks</option>
                                <option value="Months">Months</option>
                            </select>
                        </div>
                        <div class="error-message text-danger" id="minBookingDurationError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Advance Payment Required</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="advancePayment" placeholder="e.g., 1000 or 1000.50">
                            <input type="text" class="form-control" id="advancePaymentUnit" placeholder="e.g., USD, KES" style="max-width: 150px;">
                        </div>
                        <div class="error-message text-danger" id="advancePaymentError"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Refund Policy</label>
                        <textarea class="form-control" id="refundPolicy" rows="2" placeholder="e.g., Full refund if canceled 7 days prior"></textarea>
                        <div class="error-message text-danger" id="refundPolicyError"></div>
                    </div>
                    <div class="col-md-6 border">
                        <label class="form-label">Available Payment Methods</label>
                        <div class="payment-methods">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="paymentCash" value="CreditCard">
                                <label class="form-check-label" for="paymentCash">Cash</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="paymentMobileMoney" value="Paypal">
                                <label class="form-check-label" for="paymentMobileMoney">Mobile Money</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="paymentBankTransfer" value="BankTransfer">
                                <label class="form-check-label" for="paymentBankTransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <div class="error-message text-danger" id="paymentMethodsError"></div>
                    </div>
                </div>
                <div class="action-buttons mt-4">
                    <button type="button" class="btn btn-primary d-flex align-items-center gap-1" onclick="validateAndSaveBookingInfoSection('booking-info-section')">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-secondary d-flex align-items-center gap-1" onclick="clearSection('booking-info-section')">
                        <i class="bi bi-x-circle"></i> Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="navigation-container">
        <div class="nav-buttons">
            <button class="btn btn-secondary d-flex align-items-center gap-1" onclick="navigateWithModal('07-photos-section')">
                <i class="bi bi-arrow-left"></i> Previous
            </button>
            <button class="btn btn-primary d-flex align-items-center gap-1" onclick="navigateWithModal('09-availability-status-section')">
                <i class="bi bi-arrow-right"></i> Next
            </button>
        </div>
    </div>
</div>

<script>
function validateAndSaveBookingInfoSection(sectionId) {
    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

    // Get form elements
    const minBookingDuration = document.getElementById('minBookingDuration').value.trim();
    const minBookingUnit = document.getElementById('minBookingUnit').value;
    const advancePayment = document.getElementById('advancePayment').value.trim();
    const advancePaymentUnit = document.getElementById('advancePaymentUnit').value.trim();
    const refundPolicy = document.getElementById('refundPolicy').value.trim();
    const paymentOptions = document.querySelectorAll('.payment-methods .form-check-input');
    const checkedCount = Array.from(paymentOptions).filter(cb => cb.checked).length;

    // Validation patterns
    const paymentPattern = /^\d+(\.\d{1,2})?$/;
    const currencyPattern = /^[A-Za-z]{2,10}$/;

    let isValid = true;

    // Validate Minimum Booking Duration
    if (!minBookingDuration) {
        document.getElementById('minBookingDurationError').textContent = "Minimum Booking Duration is required";
        isValid = false;
    } else if (!/^\d+$/.test(minBookingDuration) || parseInt(minBookingDuration) <= 0) {
        document.getElementById('minBookingDurationError').textContent = "Please enter a valid positive number for duration";
        isValid = false;
    }

    if (!minBookingUnit) {
        document.getElementById('minBookingDurationError').textContent = "Please select a unit for Minimum Booking Duration";
        isValid = false;
    }

    // Validate Advance Payment
    if (!advancePayment) {
        document.getElementById('advancePaymentError').textContent = "Advance Payment amount is required";
        isValid = false;
    } else if (!paymentPattern.test(advancePayment)) {
        document.getElementById('advancePaymentError').textContent = "Please enter a valid amount (e.g., 1000 or 1000.50)";
        isValid = false;
    }

    if (!advancePaymentUnit) {
        document.getElementById('advancePaymentError').textContent = "Currency unit is required (e.g., USD, KES)";
        isValid = false;
    } else if (!currencyPattern.test(advancePaymentUnit)) {
        document.getElementById('advancePaymentError').textContent = "Please enter a valid currency unit (e.g., USD, KES)";
        isValid = false;
    }

    // Validate Refund Policy
    if (!refundPolicy) {
        document.getElementById('refundPolicyError').textContent = "Refund Policy is required";
        isValid = false;
    } else if (refundPolicy.length < 10) {
        document.getElementById('refundPolicyError').textContent = "Refund Policy must be at least 10 characters";
        isValid = false;
    }

    // Validate Online Payment Option
    if (checkedCount == 0) {
        document.getElementById('paymentMethodsError').textContent = "Please select an option for Online Payment";
        isValid = false;
    }

    // Proceed with save if all validations pass
    if (isValid) {
        saveSection(sectionId);
    }
}

function saveSection() {
    // Collect values from form fields
    const minBookingDuration = document.getElementById('minBookingDuration').value.trim();
    const minBookingUnit = document.getElementById('minBookingUnit').value;
    const advancePayment = document.getElementById('advancePayment').value.trim();
    const advancePaymentUnit = document.getElementById('advancePaymentUnit').value.trim();
    const refundPolicy = document.getElementById('refundPolicy').value.trim();

    // Collect checked payment methods
    const paymentOptions = document.querySelectorAll('.payment-methods .form-check-input');
    const paymentMethods = Array.from(paymentOptions)
        .filter(cb => cb.checked)
        .map(cb => cb.nextElementSibling.textContent.trim());

    // Send data to PHP using fetch
    fetch('../includes/save_booking_info.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            minBookingDuration,
            minBookingUnit,
            advancePayment,
            advancePaymentUnit,
            refundPolicy,
            paymentMethods
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('booking info saved!');
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('Network or server error: ' + error);
    });
}
</script>