@extends('layouts.employees.app')

@section('title')
    {!! __('dashboard.dashboard') !!}
@endsection
@push('style')
    <style>
        .table-container {
            position: relative;
        }

        #loading-indicator {
            font-size: 12px;
            font-weight: bolder;
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            background-color: rgba(117, 112, 112, 0.8);
            padding: 5px 10px;
            border-radius: 5px;
            color: white
        }

        #spinner {
            font-size: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">

                        <ul class="nav nav-tabs" role="tablist">
                            {{-- <li class="nav-item" role="presentation">
                                <a class="nav-link ps-0 active" id="home-tab" data-bs-toggle="tab" href="#overview"
                                    role="tab" aria-controls="overview" aria-selected="true"></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                                    aria-selected="false" tabindex="-1">{!! __('general.add') !!}</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics"
                                    role="tab" aria-selected="false" tabindex="-1">{!! __('general.update') !!}</a>
                            </li> --}}
                        </ul>

                        <div>
                            <div class="btn-wrapper">
                                <button type="button" class="btn btn-primary text-white me-0" id="create_daily_report_btn">
                                    <i class="fa fa-plus-circle"></i>
                                    {!! __('general.add') !!}
                                </button>
                                @include('employees.daily-reports.modals.create')
                                @include('employees.daily-reports.modals.edit')
                            </div>
                        </div>
                    </div>
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade active show" id="overview" role="tabpanel" aria-labelledby="overview">

                            <div class="row">
                                <div class="col-lg-12 d-flex flex-column">

                                    <div class="table-container">
                                        <div id="loading-indicator" class="loader">
                                            <!-- You can use text, an image, or CSS-only spinners -->
                                            <i class="la la-spinner spinner" id="spinner"></i>
                                            {!! __('general.loading') !!}
                                            <!-- or <img src="loading.gif" alt="Loading..."> -->
                                        </div>
                                        <div id="table_data">
                                            @include('employees.daily-reports.partials._table', [
                                                'dailyReports' => $dailyReports,
                                            ])
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            let page = 1;

            // fetch data
            function fetch_data(page) {

                $.ajax({
                    url: "{{ route('employees.dailyReports.index') }}?page=" + page,
                    data: {},
                    beforeSend: function() {
                        $('#loading-indicator').show();
                        $('#data-table tbody').empty();
                    },
                    success: function(data) {
                        $('#table_data').html(data);
                    },
                    complete: function() {
                        $('#loading-indicator').hide();
                    },
                });
            }

            // Handle pagination link clicks
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });



            // Handle search input (e.g., on keyup)
            $('#search').on('keyup', function() {
                fetch_data(1); // Reset to page 1 on new search
            });

        });

        //show daily report details
        $('body').on('click', '#show_daily_report_details_btn', function(e) {
            e.preventDefault();

            var daily_report_details = $(this).attr('daily-report-details');

            $('.daily_report_details_summernote').summernote({
                placeholder: '{!! __('general.write_here') !!}',
                tabsize: 2,
                height: 370,
                toolbar: [

                ]
            });

            $('.daily_report_details_summernote').summernote('code', daily_report_details);
            $('.daily_report_details_summernote').summernote('disable');

            $('#detailsModal').modal('show');
            console.log(daily_report_details);
        })

        // delete
        $('body').on('click', '.delete_employees_daily_report_btn', function(e) {
            e.preventDefault();


            var id = $(this).data('id');

            swal({
                title: "{{ __('general.ask_delete_record') }}",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ __('general.no') }}",
                        value: null,
                        visible: true,
                        className: "btn-danger",
                        closeModal: false,
                    },
                    confirm: {
                        text: "{{ __('general.yes') }}",
                        value: true,
                        visible: true,
                        className: "btn-info",
                        closeModal: false
                    }
                }
            }).then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: '{!! route('employees.dailyReports.destroy', ':id') !!}'.replace(':id', id),
                        data: {
                            '_token': "{!! csrf_token() !!}"
                        },
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            $('#myTable').load(location.href + (' #myTable'));

                            if (data.status == true) {
                                swal({
                                    title: "{!! __('general.deleted') !!} ",
                                    text: "{!! __('general.delete_success_message') !!} ",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            text: "{!! __('general.yes') !!}",
                                            visible: true,
                                            closeModal: true
                                        }
                                    }
                                });
                            }
                        }, //end success
                        error: function(data) {
                            console.log(data.status);
                            swal({
                                title: "{!! __('general.warning') !!} ",
                                text: "{!! __('general.delete_error_message') !!} ",
                                icon: "warning",
                                buttons: {
                                    confirm: {
                                        text: "{!! __('general.yes') !!}",
                                        visible: true,
                                        closeModal: true
                                    }
                                }
                            });
                        } //end error
                    });

                } else {
                    swal({
                        title: "{!! __('general.cancelled') !!} ",
                        text: "{!! __('general.delete_error_message') !!} ",
                        icon: "error",
                        buttons: {
                            confirm: {
                                text: "{!! __('general.yes') !!}",
                                visible: true,
                                closeModal: true
                            }
                        }
                    });
                }
            });


        });


        // change status
        $(document).on('change', '.daily_reports_change_status', function(e) {
            // e.preventDefault();
            var id = $(this).data('id');



            var url = '{!! route('employees.daliy.reports.change.status', ':id') !!}',
                url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    $('.dailyReport_status_' + data.data.id).empty();
                    $('.dailyReport_status_' + data.data.id).removeClass('badge-opacity-danger');
                    $('.dailyReport_status_' + data.data.id).removeClass('badge-opacity-success');
                    if (data.data.status == 'on') {
                        $('.dailyReport_status_' + data.data.id).addClass('badge-opacity-success');
                        $('.dailyReport_status_' + data.data.id).text("{!! __('general.enable') !!}");
                    } else if (data.data.status == '') {
                        $('.dailyReport_status_' + data.data.id).addClass('badge-opacity-danger');
                        $('.dailyReport_status_' + data.data.id).text("{!! __('general.disabled') !!}");
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
