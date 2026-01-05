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
                        <a href="{!! route('dashboard.employees.edit', $employee->id) !!}" class="btn btn-info btn-glow px-2">
                            <span class="la la-editF"></span>
                            {!! __('employees.update_employee') !!}
                        </a>
                    </div>
                </div>
                <!-- end: content header right-->

            </div>
            <!-- end :content header -->

            <!-- begin: content body -->
            <div class="row" style="display: flex ; justify-content: center;">
                <div class="col-md-12">
                    <div class="content-body"></div>
                    @include('dashboard.employees.employees.profile.tabs')
                </div>
            </div>
            <!-- end: content body -->
        </div>
        <!-- end: content body  -->
    </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
@endsection
