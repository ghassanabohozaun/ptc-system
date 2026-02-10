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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('departments.departments') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.departments.index') !!}">
                                        {!! __('departments.departments') !!}
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
                        <button type="button" class="btn btn-info  btn-glow px-2" data-toggle="modal"
                            data-target="#createDepartmentModal">
                            {!! __('departments.create_new_department') !!}
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
                                        {!! __('departments.show_all_departments') !!}
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
                                                        <th>{!! __('departments.name') !!}</th>
                                                        <th class="text-center">{!! __('departments.status') !!}</th>
                                                        <th class="text-center">{!! __('departments.manage_status') !!}</th>
                                                        <th class="text-center">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($departments as $department)
                                                        <tr>
                                                            <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                                            <td class="col-lg-8">{!! $department->name !!}</td>
                                                            <td class="col-lg-1 text-center">
                                                                @include('dashboard.employees.departments.parts.status')
                                                            </td>
                                                            <td class="col-lg-1 text-center">
                                                                @include('dashboard.employees.departments.parts.manage_status')
                                                            </td>
                                                            <td class="col-lg-1">
                                                                @include('dashboard.employees.departments.parts.actions')
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                {!! __('departments.no_departments_found') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                            <div class="float-right">
                                                {!! $departments->links() !!}
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
    @include('dashboard.employees.departments.modals.create')
    @include('dashboard.employees.departments.modals.edit')
@endsection
@push('scripts')
    <script type="text/javascript">
        // change status
        $(document).on('change', '.change_status', function(e) {
            // e.preventDefault();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                statusSwitch = 1;
            } else {
                statusSwitch = 0;
            }


            $.ajax({
                url: "{{ route('dashboard.departments.change.status') }}",
                data: {
                    statusSwitch: statusSwitch,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {

                    $('.department_status_' + data.data.id).empty();
                    $('.department_status_' + data.data.id).removeClass('badge-danger');
                    $('.department_status_' + data.data.id).removeClass('badge-success');
                    if (data.data.status == 1) {
                        $('.department_status_' + data.data.id).addClass('badge-success');
                        $('.department_status_' + data.data.id).text("{!! __('general.enable') !!}");
                    } else if (data.data.status == '') {
                        $('.department_status_' + data.data.id).addClass('badge-danger');
                        $('.department_status_' + data.data.id).text("{!! __('general.disabled') !!}");
                    }

                    if (data.status === true) {
                        flasher.success("{!! __('general.change_status_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.change_status_error_message') !!}");
                    }
                }
            });

        });
    </script>
@endpush
