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
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> Add Workflow </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="card card-default card-md mb-4 col-12 col-lg-6">
                        <div class="card-body pb-md-30  ">
                            <form method="POST" id="actionForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="course_id" id="course_id">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="comment" class="il-gray fs-14 fw-500 align-center mb-10">Comment
                                                (Optional)</label>
                                            <textarea type="text" class="form-control form-control-lg " id="comment" name="comment">{{ old('comment') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="comment" class="il-gray fs-14 fw-500 align-center mb-10">File
                                                (Optional)</label>
                                            <div class="dm-tag-wrap">

                                                <div class="dm-upload">
                                                    <div class="dm-upload__button">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-lg btn-outline-lighten btn-upload"
                                                            onclick="$('#file').click()" style="width: 100%">
                                                            <img class="svg"
                                                                src="{{ asset('dashboard/img/svg/upload.svg') }}"
                                                                alt="upload">
                                                            Click to Upload
                                                        </a>
                                                        <input type="file" name="file" class="upload-one"
                                                            id="file">
                                                    </div>
                                                    <div class="dm-upload__file">
                                                        <ul>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-end pt-30 col-12" style="gap: 10px">
                                @if (!$is_first_step)
                                    <button type="button" class="btn btn-danger btn-sm" id="RejectAction"
                                        data-step-id="{{ $step->id }}">Reject</button>
                                @endif
                                <button type="button" class="btn btn-success btn-sm" id="ApproveAction"
                                    data-step-id="{{ $step->id }}"e>Approve</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('user::user.courses.partials.actions')
        </div>
    </div>
@endsection
@section('js')
    @include('user::user.courses.scripts.submit_action_form')
@endsection
