@extends('layouts.dashboard.auth')
@section('title')
    {!! __('dashboard.login') !!}
@endsection
@push('style')
    <style type="text/css">
        .g-recaptcha {
            transform: scale(0.77);
            -webkit-transform: scale(0.77);
            transform-origin: 0 0;
            -webkit-transform-origin: 0 0;
        }
    </style>
@endpush
@section('content')
    <div class="app-content content" style="margin-right: 0 !important;">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-3 col-10 box-shadow-2 p-0 mt-5">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        @if (setting()->logo)
                                            <img src="{!! asset('uploads/settings/' . setting()->logo) !!}" alt="branding logo" width="120">
                                        @else
                                            <h2 style="font-weight: bolder">{!! setting()->site_name !!}</h2>
                                        @endif
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{!! __('auth.login_dashboard') !!}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            <div class=" alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <form action="{!! route('dashboard.post.login') !!}" method="post" class="form-horizontal"
                                            enctype="multipart/form-data" novalidate>

                                            @csrf
                                            {{-- Email --}}
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control input-lg" id="email"
                                                    name='email' placeholder="{!! __('auth.enter_you_email') !!}" tabindex="1">
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                                <div class="help-block font-small-3">
                                                    @error('email')
                                                        <strong class="text-danger"> {!! $message !!} </strong>
                                                    @enderror
                                                </div>
                                            </fieldset>

                                            {{-- password --}}
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control input-lg" id="password"
                                                    name="password" placeholder="{!! __('auth.enter_you_password') !!}" tabindex="2">
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="help-block font-small-3">
                                                    @error('password')
                                                        <strong class="text-danger"> {!! $message !!} </strong>
                                                    @enderror
                                                </div>
                                            </fieldset>

                                            {{-- NoCaptcha --}}
                                            <fieldset class="form-group position-relative">
                                                <div style="display: flex ; justify-content: center;">
                                                    {!! NoCaptcha::display() !!}
                                                </div>

                                                <div class="display: flex ; justify-content: center;">
                                                    @error('g-recaptcha-response')
                                                        <strong class="text-danger"> {!! $message !!}</strong>
                                                    @enderror
                                                </div>
                                            </fieldset>


                                            <div class="form-group row">
                                                {{-- remmber me --}}
                                                <div class="col-md-6 col-12 text-center text-md-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" name="remmber"
                                                            class="chk-remember">
                                                        <label for="remember-me"> {!! __('auth.remmber_me') !!}</label>
                                                    </fieldset>
                                                </div>
                                                {{-- forget password --}}
                                                <div class="col-md-6 col-12 text-center text-md-right"><a
                                                        href="{!! route('dashboard.password.get.email') !!}"
                                                        class="card-link">{!! __('auth.forget_password') !!}</a>
                                                </div>
                                            </div>
                                            {{-- login --}}
                                            <button type="submit" class="btn btn-info btn-block btn-lg">
                                                <i class="ft-unlock"></i> {!! __('auth.login') !!}</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
