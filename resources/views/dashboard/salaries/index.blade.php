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

                            <div class="table-container">
                                <div id="loading-indicator" class="loader">
                                    <!-- You can use text, an image, or CSS-only spinners -->
                                    <i class="la la-spinner spinner" id="spinner"></i> {!! __('general.loading') !!}
                                    <!-- or <img src="loading.gif" alt="Loading..."> -->
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
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            let page = 1;

            // fetch data
            function fetch_data(page) {
                var month = $('#month').val();
                var year = $('#year').val();

                $.ajax({
                    url: "{{ route('dashboard.salaries.index') }}?page=" + page,
                    data: {
                        month: month,
                        year: year,
                    },
                    beforeSend: function() {
                        // Show the loading indicator before the request is sent
                        $('#loading-indicator').show();
                        // Optional: clear previous table data
                        $('#data-table tbody').empty();
                    },
                    success: function(data) {
                        $('#table_data').html(data);
                    },
                    complete: function() {
                        // Hide the loading indicator when the request is complete (whether success or error)
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



            // search
            $('body').on('click', '#salaries_search_btn', function(e) {
                fetch_data(1);
            })


            // reset
            $('body').on('click', '#salaries_reset_btn', function(e) {
                e.preventDefault();
                $('#month').val('');
                $('#year').val('');
                fetch_data(1);
            });

            // Handle search input (e.g., on keyup)
            $('#search').on('keyup', function() {
                fetch_data(1); // Reset to page 1 on new search
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
