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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('world.governorates') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.governorates.index') !!}">
                                        {!! __('world.governorates') !!}
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
                            data-target="#createGovernorateModal">
                            {!! __('world.create_new_governorate') !!}
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
                                        {!! __('world.show_all_governorates') !!}
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
                                        <!-- begin: seach form -->
                                        @include('dashboard.includes.search')
                                        <!-- end: search -->
                                        <div class="table-responsive">
                                            <table class="table" id='myTable'>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{!! __('world.governorate_name') !!}</th>
                                                        <th class="text-center">{!! __('world.cites_count') !!}</th>
                                                        <th class="text-center">{!! __('world.status') !!}</th>
                                                        <th class="text-center">{!! __('world.manage_status') !!}</th>
                                                        <th class="text-center">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($governorates as $governorate)
                                                        <tr class="row_{!! $governorate->id !!}">
                                                            <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                                            <td class="col-lg-6">{!! $governorate->name !!}</td>
                                                            <td class="col-lg-1 text-center">
                                                                @include('dashboard.world.governorates.parts.cites_count')
                                                            </td>
                                                            <td class="col-lg-1 text-center">
                                                                @include('dashboard.world.governorates.parts.status')
                                                            </td>
                                                            <td class="col-lg-1 text-center">
                                                                @include('dashboard.world.governorates.parts.manage_status')
                                                            </td>
                                                            <td class="col-lg-1">
                                                                @include('dashboard.world.governorates.parts.actions')
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="9" class="text-center">
                                                                {!! __('world.no_governorates_found') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                            <div class="float-right">
                                                {!! $governorates->links() !!}
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

    @include('dashboard.world.governorates.modals.create')
    @include('dashboard.world.governorates.modals.edit')
@endsection
@push('scripts')
    <script type="text/javascript">
        // delete governorate
        $('body').on('click', '.delete_governorate_btn', function(e) {
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
                        url: '{!! route('dashboard.governorates.destroy') !!}',
                        data: {
                            id,
                            id
                        },
                        type: 'post',
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
                                // $('.row_' + id).remove();
                            } else if (data.status == false) {
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
                            }
                        }, //end success
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
        $(document).on('change', '.change_status', function(e) {
            // e.preventDefault();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                statusSwitch = 1;
            } else {
                statusSwitch = 0;
            }

            var url = '{!! route('dashboard.governorates.change.status', ':id') !!}',
                url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    $('.governorate_status_' + data.data.id).empty();
                    $('.governorate_status_' + data.data.id).removeClass('badge-danger');
                    $('.governorate_status_' + data.data.id).removeClass('badge-success');
                    if (data.data.status == 'on') {
                        $('.governorate_status_' + data.data.id).addClass('badge-success');
                        $('.governorate_status_' + data.data.id).text("{!! __('general.enable') !!}");
                    } else if (data.data.status == '') {
                        $('.governorate_status_' + data.data.id).addClass('badge-danger');
                        $('.governorate_status_' + data.data.id).text("{!! __('general.disabled') !!}");
                    }

                    if (data.status === true) {
                        flasher.success("{!! __('general.change_status_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.change_status_error_message') !!}");
                    }
                }
            });

        });

        // get all cities by governorate
        // $('body').on('click', '.get_all_cities_by_governorate_btn', function(e) {

        //     e.preventDefault();
        //     var id = $(this).data('id');

        //     $.ajax({
        //         url: '{!! route('dashboard.governorates.get.all.cities') !!}',
        //         data: {
        //             id,
        //             id
        //         },
        //         method: 'get',
        //         dataType: 'json',

        //         success: function(data) {

        //             trHTML = "";
        //             if (!$.trim(data.data)) {
        //                 $("#cities_tbody").empty();
        //                 trHTML += '<tr class="notfound" id="notfound">' +
        //                     '<td colspan="10">' + '{{ __('general.no_record_found') }}' + '</td>' +
        //                     '</tr>';
        //             } else {
        //                 $("#cities_tbody").empty();
        //                 $.each(data.data, function(i, item) {
        //                     var lang = '{!! Config::get('app.locale') !!}';

        //                     var itration = i + 1;
        //                     if (lang === 'en') {
        //                         trHTML += '<tr id="row_' + item.id +
        //                             '">' +
        //                             '<td class="col-1">' + itration + '</td>' +
        //                             '<td class="col-6">' + item.name.en + '</td>' +
        //                             '</tr>';
        //                     } else {
        //                         trHTML += '<tr id="row_' + item.id +
        //                             '">' +
        //                             '<td class="col-1">' + itration + '</td>' +
        //                             '<td class="col-6">' + item.name.ar + '</td>' +
        //                             '</tr>';
        //                     }
        //                 });
        //             }

        //             $('#cities_tbody').append(trHTML);
        //             $('#cities_modal').modal('show');
        //         }

        //     });
        // });
    </script>
@endpush
