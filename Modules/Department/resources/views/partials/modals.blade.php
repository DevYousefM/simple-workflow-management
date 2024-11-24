{{-- Delete Department --}}
<div class="modalDeleteDepartment modal fade" id="modalDeleteDepartment" tabindex="1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-info-body d-flex">
                    <div class="modal-info-icon warning">
                        <img src="{{ asset('dashboard/img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                    </div>
                    <div class="modal-info-text">
                        <h6> Are you sure you want to delete this department? </h6>
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
{{-- Department Form --}}
<div class="departmentFormModal modal fade" id="departmentFormModal" tabindex="1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#" method="POST" id="departmentForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name" class="il-gray fs-14 fw-500 align-center mb-10">Department Name</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info btn-sm" id="createDepartment">Confirm</button>
            </div>
        </div>
    </div>
</div>
