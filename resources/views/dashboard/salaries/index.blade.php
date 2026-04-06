@extends('layouts.dashboard.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/ajax-table.css') }}">
@endpush

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">

                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('salaries.salaries') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.salaries.index') !!}">
                                        {!! __('salaries.salaries') !!}
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
                            data-target="#createSalaryModal">
                            {!! __('salaries.create_new_salary') !!}
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

                            @include('dashboard.salaries.partials._search')

                            <div class="table-loader-container">
                                <div class="table-loader-overlay" id="tableLoader">
                                    <span class="premium-loader"></span>
                                </div>
                                <div id="table_data">
                                    @include('dashboard.salaries.partials._table', [
                                        'salaries' => $salaries,
                                    ])
                                </div>
                            </div>


                        </div> <!-- end: card  -->
                    </div><!-- end: row  -->
                </section><!-- end: sections  -->
            </div><!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
    @include('dashboard.salaries.modals.create')
    @include('dashboard.salaries.modals.edit')
    @include('dashboard.salaries.modals.details')
@endsection
@push('scripts')
    <script src="{{ asset('assets/dashboard/js/ajax-table.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize Standard AJAX Table
            if (typeof initIndexTable === "function") {
                initIndexTable({
                    container: "#table_data",
                    loader: "#tableLoader"
                });
            }

            // Specific Fetch for Search/Refresh
            window.fetch_data = function(page = 1) {
                $.ajax({
                    url: "{{ route('dashboard.salaries.index') }}?page=" + page,
                    data: {
                        month: $('#month').val(),
                        year: $('#year').val(),
                    },
                    beforeSend: function() { $('#tableLoader').fadeIn(200); },
                    success: function(data) { $('#table_data').html(data); },
                    complete: function() { $('#tableLoader').fadeOut(200); },
                });
            }

            // search
            $('body').on('click', '#salaries_search_btn', function(e) {
                e.preventDefault();
                fetch_data(1);
            })

            // reset
            $('body').on('click', '#salaries_reset_btn', function(e) {
                e.preventDefault();
                $('#month').val('');
                $('#year').val('');
                fetch_data(1);
            });
        });


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
                url: "{{ route('dashboard.salaries.change.status') }}",
                data: {
                    statusSwitch: statusSwitch,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {

                    $('.salary_status_' + data.data.id).empty();
                    $('.salary_status_' + data.data.id).removeClass('border-danger').removeClass(
                        'danger');
                    $('.salary_status_' + data.data.id).removeClass('border-success').removeClass(
                        'success');

                    if (data.data.status == 1) {
                        $('.salary_status_' + data.data.id).addClass('border-success').addClass(
                            'success');
                        $('.salary_status_' + data.data.id).text("{!! __('general.enable') !!}");
                    } else if (data.data.status == '') {
                        $('.salary_status_' + data.data.id).addClass('border-danger').addClass(
                            'danger');
                        $('.salary_status_' + data.data.id).text("{!! __('general.disabled') !!}");
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
