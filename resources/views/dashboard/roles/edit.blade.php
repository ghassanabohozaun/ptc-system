@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <form class="form" action="{!! route('dashboard.roles.update', $role->id) !!}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('roles.roles') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.roles.index') !!}">
                                            {!! __('roles.roles') !!}

                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('roles.update_role') !!}
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- end: content header left-->

                    <!-- begin: content header right-->
                    <div class="content-header-right col-md-6 col-12">
                        <div class="float-md-right mb-1">
                            <button class="btn btn-info  btn-glow px-2" type="submit">
                                <i class="la la-save"></i>
                                {!! __('general.update') !!}
                            </button>

                        </div>
                    </div>
                    <!-- end: content header right-->

                </div> <!-- end :content header -->

                <!-- begin: content body -->
                <div class="content-body">

                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- begin: card header -->
                                    <div class="card-header">
                                        <h4 class="card-title" id="basic-layout-colored-form-control">
                                            {!! __('roles.update_role') !!}
                                        </h4>
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end: card header -->

                                    <!-- begin: card content -->
                                    <div class="card-content collapse show">
                                        <div class="card-body">


                                            <div class="form-body">
                                                <!-- begin: row -->
                                                <div class="row d-none">
                                                    <input type="hidden" id='id' , name="id"
                                                        value="{!! $role->id !!}">
                                                </div>
                                                <!-- end: row -->


                                                <!-- begin: row -->
                                                <div class="row">

                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role_name">{!! __('roles.role_ar') !!}</label>
                                                            <input type="text" id="role" name="role[ar]"
                                                                value="{!! old('role.ar', $role->getTranslation('role', 'ar')) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('roles.enter_role_ar') !!}">
                                                            @error('role.ar')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <!-- end: input -->

                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role_name">{!! __('roles.role_en') !!}</label>
                                                            <input type="text" id="role" name="role[en]"
                                                                value="{!! old('role.en', $role->getTranslation('role', 'en')) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('roles.enter_role_en') !!}">
                                                            @error('role.en')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <!-- end: input -->

                                                </div>
                                                <!-- end: row -->


                                                <!-- begin: row -->
                                                <div class="row mt-2">
                                                    <!-- begin: input -->
                                                    @foreach (Config('global.permissions') as $key => $value)
                                                        <div class="col-md-3 mt-1">
                                                            <fieldset class="checkboxsas">
                                                                <label>
                                                                    <input type="checkbox" value="{!! $key !!}"
                                                                        name="permissions[]" class="checkbox"
                                                                        @checked(in_array($key, $role->permissions))>
                                                                    &nbsp; {{ __(config('global.permissions.', $value)) }}
                                                                </label>
                                                            </fieldset>
                                                        </div>
                                                    @endforeach
                                                    @error('permissions')
                                                        <div class="col-md-12">
                                                            <span class="text text-danger">
                                                                <strong>{!! $message !!}</strong>
                                                            </span>
                                                        </div>
                                                    @enderror
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row -->

                                            </div>
                                        </div>
                                        <!-- end: card content -->
                                    </div>
                                </div> <!-- end: card  -->
                            </div><!-- end: row  -->
                    </section><!-- end: sections  -->
                </div><!-- end: content body  -->
            </div> <!-- end: content wrapper  -->
        </form>
    </div><!-- end: content app  -->
@endsection
