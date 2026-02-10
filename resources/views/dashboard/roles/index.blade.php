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

                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-1">
                        {{-- <a href="{{ route('dashboard.roles.create') }}" class="btn btn-info  btn-glow px-2" i>
                            {!! __('roles.create_new_role') !!}</a> --}}

                        <button type="button" class="btn btn-info  btn-glow px-2" data-toggle="modal"
                            data-target="#createRoleModal">
                            {!! __('roles.create_new_role') !!}
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
                                        {!! __('roles.show_all_roles') !!}
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                        <div class="table-responsive">
                                            <table class="table" id='myTable'>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{!! __('roles.role_name') !!}</th>
                                                        <th>{!! __('roles.permissions') !!}</th>
                                                        <th class="text-center">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($roles as $role)
                                                        <tr>
                                                            <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                                            <td class="col-lg-1">{!! $role->role !!}</td>
                                                            <td class="col-lg-8">
                                                                @foreach (config('global.permissions') as $name => $value)
                                                                    {{ in_array($name, $role->permissions) ? __(config('global.permissions.', $value)) . ' | ' : '' }}
                                                                @endforeach
                                                            </td>
                                                            <td class="col-lg-1 text-center">
                                                                @include('dashboard.roles.parts.actions')
                                                            </td>
                                                        </tr>
                                                        <!-- begin: delete form -->
                                                        {{-- <form id='delete_form_{{ $role->id }}'
                                                            action=" {!! route('dashboard.roles.destroy', $role->id) !!}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form> --}}
                                                    @empty
                                                        <tr>
                                                            <td colspan="4" class="text-center">
                                                                {!! __('roles.no_roles_found') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                            <div class="float-right">
                                                {!! $roles->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div> <!-- end: card  -->
                    </div><!-- end: row  -->
                </section><!-- end: sections  -->
            </div><!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
    @include('dashboard.roles.modals.create')
    @include('dashboard.roles.modals.edit')


@endsection
