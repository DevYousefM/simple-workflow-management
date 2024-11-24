@extends('dashboard.layouts.main')
@section('css')
    <style>
        .dm-pagination__item:not(:last-child) {
            margin-right: 5px !important;
        }
    </style>
@endsection
@section('content')
    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main user-member justify-content-sm-between ">
                        <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> Users </h4>
                            </div>
                        </div>
                        <div class="action-btn d-flex" style="gap: 10px">
                            <a href="#" id="addUserBtn" data-bs-toggle="modal" data-bs-target="#userFormModal"
                                class="btn px-15 btn-primary">
                                <i class="las la-plus fs-16"></i> Add User
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="userDatatable global-shadow border-light-0 p-30 bg-white radius-xl w-100 mb-30">
                        <div class="project-top-wrapper d-flex justify-content-between flex-wrap mb-25 mt-n10">
                            <div class="d-flex align-items-center flex-wrap justify-content-center">
                                <div class="project-search order-search  global-shadow mt-10">
                                    <form action="/" class="order-search__form">
                                        <img src="{{ asset('dashboard/img/svg/search.svg') }}" alt="search"
                                            class="svg">
                                        <input class="form-control me-sm-2 border-0 box-shadow-none" id="search-input"
                                            type="search" placeholder="Filter by keyword" aria-label="Search">
                                    </form>
                                </div><!-- End: .project-search -->

                            </div><!-- End: .d-flex -->
                        </div><!-- End: .project-top-wrapper -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped " id="users_table">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title">Name</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Email</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Department</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title ">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="usersTableBody">
                                    @include('user::partials._users', [
                                        'users' => $users,
                                    ])
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end pt-30" id="pagination-container">
                            {{ $users->appends(['search' => request('search')])->links('dashboard.components.custom-pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('user::partials.modals')
@endsection
@section('js')
    <script>
        activateSearchInput("{{ route('dashboard.users.index') }}", 'usersTableBody', 'pagination-container');
    </script>
    @include('user::scripts.submit_form')
    @include('user::scripts.delete_user')
@endsection