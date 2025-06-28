<!-- Save Confirmation Modal -->
<div class="modal fade" id="saveConfirmationModal" tabindex="-1" aria-labelledby="saveConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="saveConfirmationModalLabel">Unsaved Changes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You have unsaved changes. Would you like to save them before proceeding?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="proceedWithoutSaving()">Don't Save</button>
                <button type="button" class="btn btn-primary" onclick="saveAndProceed()">Save & Continue</button>
            </div>
        </div>
    </div>
</div> 