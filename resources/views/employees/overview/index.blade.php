@extends('layouts.employees.app')

@section('title')
    {!! __('dashboard.dashboard') !!}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link ps-2 active" id="home-tab" data-bs-toggle="tab" href="#overview"
                                    role="tab" aria-controls="overview" aria-selected="true">{!! __('general.overview') !!}</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more"
                                    role="tab" aria-selected="false" tabindex="-1">{!! __('general.profile') !!}</a>
                            </li>
                        </ul>
                        <div>
                            <div class="btn-wrapper">

                                {{-- <a href="javascript:void(0)" class="btn btn-otline-dark align-items-center">
                                    <i class="icon-share"></i>
                                    {!! __('general.share') !!}
                                </a> --}}

                                <a href="javascript:void(0)" class="btn btn-otline-dark" id="employee_change_password_btn">
                                    <i class="fa fa-key"></i>
                                    {!! __('employees.change_password') !!}
                                </a>

                                <a href="javascript:void(0)" class="btn btn-primary text-white me-0">
                                    <i class="icon-download"></i>
                                    {!! __('general.actions') !!}
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="tab-content tab-content-basic">
                        @include('employees.overview.tabs.overview')
                        @include('employees.overview.tabs.more')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('employees.overview.modals.change-password')
@endsection
