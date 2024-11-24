{{-- Delete course --}}
<div class="modalDeleteCourse modal fade" id="modalDeleteCourse" tabindex="1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-info-body d-flex">
                    <div class="modal-info-icon warning">
                        <img src="{{ asset('dashboard/img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                    </div>
                    <div class="modal-info-text">
                        <h6> Are you sure you want to delete this course? </h6>
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
{{-- course Form --}}
<div class="courseFormModal modal fade" id="courseFormModal" tabindex="1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#" method="POST" id="courseForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name" class="il-gray fs-14 fw-500 align-center mb-10">Course
                                    Name</label>
                                <input type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
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
                <button type="button" class="btn btn-info btn-sm" id="SubmitCourseForm">Confirm</button>
            </div>
        </div>
    </div>
</div>
