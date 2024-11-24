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
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> Add Workflow </h4>
                            </div>
                        </div>
                        <div class="action-btn d-flex" style="gap: 10px">
                            <button id="saveWorkflow" type="button" class="btn btn-success">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default card-md mb-4">
                        <div class="card-body pb-md-30">
                            <form id="workflowForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6 ">
                                        <div class="form-group">
                                            <label for="name" class="il-gray fs-14 fw-500 align-center mb-10">Workflow
                                                Name</label>
                                            <input type="text"
                                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <label for="course_id"
                                            class="il-gray fs-14 fw-500 align-center mb-10">Course</label>
                                        <select name="course_id" id="course_id" class="form-control form-control-lg">
                                            <option value="0" selected disabled>Select Course</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                                    {{ $course->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('workflow::steps.steps')

    </div>
@endsection
@section('js')
    @include('workflow::steps.steps_scripts')
    @include('workflow::scripts.submit_workflow_form')
    @include('workflow::scripts.create_scripts')
@endsection
