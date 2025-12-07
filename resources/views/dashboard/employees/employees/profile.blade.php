@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">

                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('employees.profile') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.employees.index') !!}">
                                        {!! __('employees.employees') !!}
                                    </a>
                                </li>

                                <li class="breadcrumb-item">
                                    <a href="">
                                        {!! __('employees.profile') !!}
                                    </a>
                                </li>
                                {{-- <li class="breadcrumb-item">
                                    <a href="">
                                        {!! $employee->EmployeeFullName() !!}
                                    </a>
                                </li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-2">
                        <a href="{{ route('dashboard.employees.create') }}" class="btn btn-info btn-glow px-2">
                            <span class="la la-pencil"></span>
                            {!! __('employees.create_new_employee') !!}
                        </a>
                    </div>
                </div>
                <!-- end: content header right-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="row" style="display: flex ; justify-content: center;">
                <div class="col-md-12">
                    <div class="content-body">

                        <section id="basic-form-layouts">
                            <div class="row match-height">
                                <div class="col-md-12">

                                    <section class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-head">
                                                    <div class="card-header">
                                                        <div class="media">
                                                            <div class="media-left pr-1">
                                                                <span class="avatar avatar-lg rounded-circle">
                                                                    <img src="{!! asset('uploads/employeesPhotos/' . $employee->photo) !!}"
                                                                        alt="avatar"><i></i></span>
                                                            </div>
                                                        </div>

                                                        <h3 class="media-heading pt-2 text-info">
                                                            {!! $employee->EmployeeFullName() !!}
                                                        </h3>

                                                        <a class="heading-elements-toggle">
                                                            <i class="la la-ellipsis-h font-medium-3"></i></a>

                                                        <div class="heading-elements">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="ft-plus white"></i> Add action</button>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop1" type="button"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm">
                                                                    <i class="ft-download-cloud white"></i>
                                                                </button>
                                                                <span aria-labelledby="btnSearchDrop1"
                                                                    class="dropdown-menu mt-1 dropdown-menu-right"
                                                                    x-placement="bottom-end"
                                                                    style="position: absolute; transform: translate3d(57px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="ft-upload"></i> Import
                                                                    </a>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="ft-download"></i> Export
                                                                    </a>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="ft-shuffle"></i> Find Duplicate
                                                                    </a>
                                                                </span>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                @include('dashboard.employees.employees.profile.tabs')
                                                            </div>

                                                            <div class="col-lg-4"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </section>
                    </div><!-- end: row  -->
                    </section><!-- end: sections  -->
                </div>
            </div>
        </div>
        <!-- end: content body  -->
    </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
@endsection


@push('scripts')
@endpush
