@extends('layouts.employees.auth')
@section('title')
    {!! __('auth.login') !!}
@endsection
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            @if (setting()->logo)
                                <div class="brand-logo">
                                    <img src="{!! asset('uploads/settings/' . setting()->logo) !!}" alt="logo">
                                @else
                                    <h4 class="brand-text">{!! setting()->site_name !!}</h4>
                                </div>
                            @endif

                            <h6 class="fw-light">{!! __('auth.sign_in_to_continue') !!}</h6>
                            <form action="{!! route('employees.post.login') !!}" method="post" class="form-horizontal"
                                enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="personal_id"
                                        id='personal_id' placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        id='password' placeholder="Password">
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">
                                        {!! __('auth.login') !!}
                                    </button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> {!! __('auth.remmber_me') !!}</label>
                                    </div>
                                    <a href="javascript:void(0)" class="auth-link text-black">{!! __('auth.forget_password') !!}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
