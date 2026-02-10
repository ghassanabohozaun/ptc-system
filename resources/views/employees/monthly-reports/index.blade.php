@extends('layouts.employees.app')

@section('title')
    {!! __('dashboard.dashboard') !!}
@endsection


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
                                <button type="button" class="btn btn-primary text-white me-0" id="create_monthly_report_btn">
                                    <i class="fa fa-plus-circle"></i>
                                    {!! __('general.add') !!}
                                </button>
                                @include('employees.monthly-reports.modals.create')
                                @include('employees.monthly-reports.modals.edit')
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
                                            @include('employees.monthly-reports.partials._table', [
                                                'monthlyReports' => $monthlyReports,
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
                    url: "{{ route('employees.monthlyReports.index') }}?page=" + page,
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
