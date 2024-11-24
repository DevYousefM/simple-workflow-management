@extends('dashboard.layouts.guest')
@section('content')
    <main class="main-content">

        <div class="admin h-100vh d-flex justify-content-center align-items-center">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                        <div class="edit-profile">
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="edit-profile__title">
                                        <h6>Sign in</h6>
                                    </div>
                                </div>
                                <form action="{{ route('dashboard.login') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="edit-profile__body">
                                            <div class="form-group mb-25">
                                                <label for="username">Email</label>
                                                <input type="text" class="form-control" name="username" id="username"
                                                    placeholder="name@example.com">
                                                @if ($errors->has('username'))
                                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group mb-15">
                                                <label for="password-field">Password</label>
                                                <div class="position-relative">
                                                    <input id="password-field" type="password" class="form-control"
                                                        name="password" placeholder="Password">
                                                    <div
                                                        class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                    </div>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>

                                            <div
                                                class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button type="submit"
                                                    class="btn btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn "
                                                    style="background-color: #1a1f2b ; color:#fff">
                                                    Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- End: .card-body -->
                                </form>

                            </div><!-- End: .card -->
                        </div><!-- End: .edit-profile -->
                    </div><!-- End: .col-xl-5 -->
                </div>
            </div>
        </div><!-- End: .admin-element  -->

    </main>
    <div id="overlayer">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>
@endsection
