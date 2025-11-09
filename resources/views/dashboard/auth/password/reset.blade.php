@extends('layouts.dashboard.auth')
@section('title')
    {!! __('auth.reset_password') !!}
@endsection

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
                                        <h2 style="font-weight: bolder">{!! setting()->site_name !!}</h2>
                                        {{-- <img src="{!! asset('assets/dashbaord') !!}/images/logo/logo-dark.png" alt="branding logo"> --}}
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{!! __('auth.login_dashboard') !!}</span>
                                    </h6>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">

                                        @if (session('error'))
                                            <div class=" alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <form class="form-horizontal" action="{!! route('dashboard.password.post.reset') !!}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" class="form-control form-control-lg input-lg"
                                                    id="email" name="email" value="{{ $email }}"
                                                    placeholder="{!! __('auth.you_email_address') !!}">
                                                <div class="form-control-position"> <i class="ft-mail"></i> </div>
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control form-control-lg input-lg"
                                                    id="password" name="password" placeholder="{!! __('auth.enter_password') !!}">
                                                <div class="form-control-position"> <i class="la la-key"></i> </div>
                                                @error('password')
                                                    <strong class="text text-danger">{!! $message !!}</strong>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control form-control-lg input-lg"
                                                    id="confirm_password" name="confirm_password"
                                                    placeholder="{!! __('auth.enter_confirm_password') !!}">
                                                <div class="form-control-position"> <i class="la la-key"></i> </div>
                                                @error('confirm_password')
                                                    <strong class="text text-danger">{!! $message !!}</strong>
                                                @enderror
                                            </fieldset>


                                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">
                                                <i class="ft-unlock"></i>
                                                {!! __('auth.reset_password') !!}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="float-sm-left text-center">
                                        <a href="{!! route('dashboard.get.login') !!}" class="card-link btn btn-info ">
                                            <i class="ft-unlock"></i> {!! __('auth.login') !!}
                                        </a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
