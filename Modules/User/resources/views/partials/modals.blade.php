{{-- Delete User --}}
<div class="modalDeleteUser modal fade" id="modalDeleteUser" tabindex="1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-info-body d-flex">
                    <div class="modal-info-icon warning">
                        <img src="{{ asset('dashboard/img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                    </div>
                    <div class="modal-info-text">
                        <h6> Are you sure you want to delete this user? </h6>
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
{{-- User Form --}}
<div class="userFormModal modal fade" id="userFormModal" tabindex="1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#" method="POST" id="userForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name" class="il-gray fs-14 fw-500 align-center mb-10">Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name"
                                    value="{{ old('name') }}">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email" class="il-gray fs-14 fw-500 align-center mb-10">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    value="{{ old('email') }}">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password" class="il-gray fs-14 fw-500 align-center mb-10">User
                                    Password</label>
                                <input type="password" class="form-control form-control-lg" id="password"
                                    name="password" value="{{ old('password') }}">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="department_id"
                                class="il-gray fs-14 fw-500 align-center mb-10">Department</label>
                            <select name="department_id" id="department_id" class="form-control form-control-lg">
                                <option value="0" selected disabled>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info btn-sm" id="createUser">Confirm</button>
            </div>
        </div>
    </div>
</div>
