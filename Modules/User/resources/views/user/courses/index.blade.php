@extends('user::layouts.user')
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
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> Courses Need to review </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="userDatatable global-shadow border-light-0 p-30 bg-white radius-xl w-100 mb-30">
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped " id="courses_table">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title">Name</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Workflow</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title ">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="coursesTableBody">
                                    @include('user::user.courses.partials._courses', [
                                        'courses' => $courses,
                                    ])
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end pt-30" id="pagination-container">
                            {{ $courses->links('dashboard.components.custom-pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
