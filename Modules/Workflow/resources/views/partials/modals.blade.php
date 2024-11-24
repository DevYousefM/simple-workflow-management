{{-- Delete workflow --}}
<div class="modalDeleteWorkflow modal fade" id="modalDeleteWorkflow" tabindex="1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-info-body d-flex">
                    <div class="modal-info-icon warning">
                        <img src="{{ asset('dashboard/img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                    </div>
                    <div class="modal-info-text">
                        <h6> Are you sure you want to delete this workflow? </h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">
                    Cancel </button>
                <button type="button" class="btn btn-info btn-sm" data-bs-dismiss="modal" id="confirmDelete">
                    Confirm </button>
            </div>
        </div>
    </div>
</div>
