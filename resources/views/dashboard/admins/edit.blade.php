@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <form class="form" action="{!! route('dashboard.admins.update', $admin->id) !!}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('admins.admins') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.admins.index') !!}">
                                            {!! __('admins.admins') !!}

                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('admins.update_admin') !!}
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
                                            {!! __('admins.update_admin') !!}
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
                                                <!-- begin: input -->
                                                <input type="hidden" id='id' , name="id"
                                                    value="{!! $admin->id !!}">
                                                <!-- end input -->

                                                <!-- begin: row -->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name_ar">{!! __('admins.name_ar') !!}</label>
                                                            <input type="text" id="name_ar" name="name[ar]"
                                                                value="{!! old('name.ar', $admin->getTranslation('name', 'ar')) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('admins.enter_name_ar') !!}">
                                                            @error('name.ar')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <!-- end: input -->
                                                    </div>

                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{!! __('admins.name_en') !!}</label>
                                                            <input type="text" id="name" name="name[en]"
                                                                value="{!! old('name.en', $admin->getTranslation('name', 'en')) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('admins.enter_name_en') !!}">
                                                            @error('name.en')
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
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="email">{!! __('admins.email') !!}</label>
                                                            <input type="email" id="email" name="email"
                                                                value="{!! old('email', $admin->email) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('admins.enter_email') !!}">
                                                            @error('email')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- begin: input -->
                                                </div>
                                                <!-- end: row -->

                                                <!-- begin: row -->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="password">{!! __('admins.password') !!}</label>
                                                            <input type="password" id="password" name="password"
                                                                value="{!! old('password') !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('admins.enter_password') !!}">
                                                            @error('password')
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
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="password_confirm">{!! __('admins.password_confirm') !!}</label>
                                                            <input type="password" id="password_confirm"
                                                                name="password_confirm" value="{!! old('password_confirm') !!}"
                                                                class="form-control" autocomplete="off"
                                                                placeholder="{!! __('admins.enter_password_confirm') !!}">
                                                            @error('password_confirm')
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
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="role_id">{!! __('admins.role_id') !!}</label>
                                                            <select class="form-control" id="DefaultSelect"
                                                                id='role_id' name="role_id">
                                                                <option value="" selected="">
                                                                    {!! __('general.select_from_list') !!}</option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{!! $role->id !!}"
                                                                        {{ old('role_id', $admin->role_id) == $role->id ? 'selected' : '' }}>
                                                                        {!! $role->role !!}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('role_id')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end: input -->

                                                <!-- begin: row  status-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="status">{!! __('admins.status') !!}</label>
                                                            <div class="input-group">
                                                                <div
                                                                    class="d-inline-block custom-control custom-radio mr-1">
                                                                    <input type="radio"
                                                                        class="custom-control-input bg-success"
                                                                        name="status" id="activeStatusRadio"
                                                                        value="1" @checked(old('status', $admin->status) == 1)>
                                                                    <label class="custom-control-label"
                                                                        for="activeStatusRadio">{!! __('general.active') !!}
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="d-inline-block custom-control custom-radio mr-1">
                                                                    <input type="radio"
                                                                        class="custom-control-input bg-danger"
                                                                        name="status" id="inActiveStatusRadio"
                                                                        value="0" @checked(old('status', $admin->status) == 0)>
                                                                    <label class="custom-control-label"
                                                                        for="inActiveStatusRadio">{!! __('general.inactive') !!}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            @error('status')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row  status-->

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
