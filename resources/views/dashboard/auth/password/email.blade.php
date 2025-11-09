@extends('layouts.dashboard.auth')
@section('title')
    {!! __('auth.enter_email') !!}
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


                                        @if ($errors->has('error'))
                                            <div class=" alert alert-danger">
                                                {!! $errors->first('error') !!}
                                            </div>
                                        @endif

                                        <form class="form-horizontal" action="{!! route('dashboard.password.post.email') !!}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" class="form-control form-control-lg input-lg"
                                                    id="email" name="email" placeholder="{!! __('auth.you_email_address') !!}">
                                                <div class="form-control-position"> <i class="ft-mail"></i> </div>
                                                @error('email')
                                                    <strong class="text text-danger">{!! $message !!}</strong>
                                                @enderror
                                            </fieldset>


                                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">
                                                <i class="la la-lock"></i>
                                                {!! __('auth.recover_password') !!}
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
