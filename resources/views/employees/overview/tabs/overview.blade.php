<div class="tab-pane fade active show" id="overview" role="tabpanel" aria-labelledby="overview">

    <!-- begin: row -->
    <div class="row">
        <!-- begin: col-lg-8 -->
        <div class="col-lg-8 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="card-title card-title-dash">{!! __('dailyReports.show_latest_daily_reports') !!}</h4>
                                </div>
                                <a href="{!! route('employees.dailyReports.index') !!}" class="btn btn-otline-dark align-items-center">
                                    <i class="fa fa-link"></i>
                                    {!! __('general.show_all') !!}
                                </a>
                            </div>
                            <div class="table-responsive  mt-3">
                                <table class="table select-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-flat mt-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            aria-checked="false" id="check-all"><i
                                                            class="input-helper"></i><i
                                                            class="input-helper"></i></label>
                                                </div>
                                            </th>
                                            <th>{!! __('dailyReports.date') !!}</th>
                                            <th>{!! __('dailyReports.details') !!}</th>
                                            <th>{!! __('dailyReports.file') !!}</th>
                                            <th>{!! __('dailyReports.status') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dailyReports as $dailyReport)
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                aria-checked="false"><i class="input-helper"></i><i
                                                                class="input-helper"></i></label>
                                                    </div>
                                                </td>
                                                <td> {!! $dailyReport->date !!}</td>
                                                <td> @include('employees.daily-reports.parts.details')</td>
                                                <td> @include('employees.daily-reports.parts.file') </td>
                                                <td> @include('employees.daily-reports.parts.status')</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    {!! __('dailyReports.no_daily_reports_found') !!}
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: col-lg-8 -->


        <!-- begin: col-lg-4 -->
        <div class="col-lg-4 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="card-title card-title-dash"></h4>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: col-lg-4 -->


    </div>
    <!-- end: row -->

</div>
@push('scripts')
    <script>
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
        })
    </script>
@endpush
