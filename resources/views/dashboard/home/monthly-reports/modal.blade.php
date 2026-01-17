<div class="modal fade" id="monthlyReportsEmployeesModal" tabindex="-1" role="dialog"
    aria-labelledby="monthlyReportsEmployeesModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <!--begin::modal header-->
            <div class="modal-header">
                <h5 class="modal-title" id="monthlyReportsEmployeesModalLabel"> {!! __('monthlyReports.show_employees') !!}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            <!--begin::modal body-->
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12">

                        <!-- begin: row -->
                        <div class="row">
                            <!-- begin: input -->
                            <div class="col-md-12">

                                <div class="form-row align-items-center">
                                    <div class="col-sm-4 my-1">
                                        <label class="sr-only" for="inlineFormInputName">{!! __('monthlyReports.month') !!}</label>
                                        <input type="month" id="month" name="month" class="form-control"
                                            id="inlineFormInputName" placeholder="{!! __('monthlyReports.enter_month') !!}">
                                    </div>


                                    <div class="col-auto my-1">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            id="monthly_report_employees_search_btn">
                                            <i class="la la-search"></i>
                                            {!! __('general.search') !!}
                                        </button>
                                    </div>

                                    <div class="col-auto my-1">
                                        <button type="button" class="btn btn-sm btn-light-dark"
                                            id="monthly_report_employees_reset_btn">
                                            <i class="la la-close"></i>
                                            {!! __('general.reset') !!}
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!-- end: input -->
                        </div>
                        <!-- end: row -->

                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div id="loading-indicator" class="loader">
                                    <!-- You can use text, an image, or CSS-only spinners -->
                                    <i class="la la-spinner spinner" id="spinner"></i> {!! __('general.loading') !!}
                                    <!-- or <img src="loading.gif" alt="Loading..."> -->
                                </div>
                                <div id="table_data">
                                    @include('dashboard.home.monthly-reports._table')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end: form-->
            </div>
            <!--end::modal body-->



        </div>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            // var currentDate = new Date();
            // var year = currentDate.getFullYear();
            // var month = currentDate.getMonth() + 1;
            // var monthYeaar = year + '-' + month;
            // $('#month').val(monthYeaar);



            // fetch data
            function fetch_data() {

                var month = $('#month').val();

                $.ajax({
                    url: "{{ route('dashboard.get.monthly.reports.employees') }}",
                    data: {
                        month: month,
                    },
                    beforeSend: function() {
                        // Show the loading indicator before the request is sent
                        $('#loading-indicator').show();
                        // Optional: clear previous table data
                        $('#data-table tbody').empty();
                    },
                    success: function(data) {

                        var trHTML = '';

                        if (data.status == true) {

                            $("#records_table").empty();
                            $.each(data.data, function(i, item) {
                                var iterationNumber = i + 1;

                                trHTML += '<tr>' +
                                    '<td>' + iterationNumber + '</td>' +
                                    '<td>' + item.full_name + '</td>' +
                                    '<td>' + item.month + '</td>' +
                                    '<td>' + item.report_status + '</td>' +
                                    '<td>' + item.file + '</td>' +
                                    '</tr>';
                            });

                            $('#records_table').append(trHTML);

                        } else {
                            $("#records_table").empty();
                            trHTML += '<tr>' +
                                '<td colspan="5">' +
                                '{{ __('employees.no_data_found') }}' + '</td>' +
                                '</tr>';
                            $('#records_table').append(trHTML);
                        }


                    },
                    complete: function() {
                        // Hide the loading indicator when the request is complete (whether success or error)
                        $('#loading-indicator').hide();
                    },
                });
            }


            // search
            $('body').on('click', '#monthly_report_employees_search_btn', function(e) {
                fetch_data();
            });

            // reset
            $('body').on('click', '#monthly_report_employees_reset_btn', function(e) {
                e.preventDefault();
                $('#month').val('');
                var trHTML = '';
                $("#records_table").empty();
                trHTML += '<tr>' +
                    '<td colspan="5">' +
                    '{{ __('employees.no_data_found') }}' + '</td>' +
                    '</tr>';
                $('#records_table').append(trHTML);

            })

        });
    </script>
@endpush
