@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashbaord/css/ajax-table.css') }}">
@endpush

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">

                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('employees.employees') !!}</h3>
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

                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-1">
                        <a href="{!! route('dashboard.employees.create') !!}" class="btn btn-info btn-glow px-2">
                            {!! __('employees.create_new_employee') !!}
                        </a>
                    </div>
                </div>
                <!-- end: content header right-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->

                                    @include('dashboard.employees.employees.partials._search')


                                    <div class="table-loader-container">
                                        <div class="table-loader-overlay" id="tableLoader">
                                            <span class="premium-loader"></span>
                                        </div>

                                        <div id="table_data">
                                            @include('dashboard.employees.employees.partials._table', [
                                                'employees' => $employees,
                                            ])
                                        </div>
                                    </div>

                                </div><!-- end: row  -->
                        </section><!-- end: sections  -->
                    </div>
                </div>
            </div>
            <!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->

    <!-- Details Modal -->
    @include('dashboard.employees.employees.modals.details')
@endsection


@push('scripts')
    <script src="{{ asset('assets/dashbaord/js/ajax-table.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize the Premium AJAX Table
            initIndexTable();

            // Search button trigger
            $('body').on('click', '#employee_search_btn', function(e) {
                e.preventDefault();
                if (typeof fetch_data === 'function') {
                    fetch_data(1);
                }
            });

            // Reset button trigger
            $('body').on('click', '#employee_reset_btn', function(e) {
                e.preventDefault();
                $("#employee_id").val('').trigger('change');
                $('#personal_id').val('');
                if (typeof fetch_data === 'function') {
                    fetch_data(1);
                }
            });

            //  change status
            var statusSwitch = false;
            $('body').on('change', '.change_status', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                statusSwitch = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: "{{ route('dashboard.employees.change.status') }}",
                    data: {
                        statusSwitch: statusSwitch,
                        id: id
                    },
                    type: 'post',
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == true) {
                            flasher.success("{!! __('general.change_status_success_message') !!}");
                        } else {
                            flasher.error("{!! __('general.change_status_error_message') !!}");
                        }
                    },
                });
            });
        });
    </script>
@endpush
