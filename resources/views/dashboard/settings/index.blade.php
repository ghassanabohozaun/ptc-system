@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <form class="form" id="settings_form" action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('settings.settings') !!}
                        </h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.settings.index') !!}">
                                            {!! __('settings.settings') !!}

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
                            <button class="btn btn-info  btn-glow px-2" type="submit">
                                <i class="la la-save"></i>
                                {!! __('general.save') !!}
                                <i class="la la-refresh spinner spinner_loading d-none">
                                </i>
                            </button>

                        </div>
                    </div>
                    <!-- end: content header right-->

                </div> <!-- end :content header -->

                <!-- begin: content body -->
                <div class="content-body">

                    <section id="basic-form-layouts">
                        <div class="row">


                            <!-- start: row  basic settings -->
                            <div class="col-md-8">
                                <div class="card" style="height: 480px">
                                    <!-- begin: card header -->
                                    <div class="card-header">
                                        <h4 class="card-title" id="basic-layout-colored-form-control">
                                            {!! __('settings.basic_settings_section') !!}
                                        </h4>
                                    </div>
                                    <!-- end: card header -->

                                    <!-- begin: card content -->
                                    <div class="card-content collapse show">
                                        <div class="card-body">

                                            <div class="form-body">

                                                <input type="hidden" id='id' name="id"
                                                    value="{!! setting()->id !!}">

                                                <!-- begin: row site name-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="site_name">{!! __('settings.site_name_ar') !!}</label>
                                                            <input type="text" id="site_name_ar" name="site_name[ar]"
                                                                value="{!! old('site_name.ar', setting()->getTranslation('site_name', 'ar')) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_site_name_ar') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="site_name_ar_error"></strong>
                                                            </span>

                                                        </div>
                                                    </div>
                                                    <!-- end: input -->

                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="site_name">{!! __('settings.site_name_en') !!}</label>
                                                            <input type="text" id="site_name_en" name="site_name[en]"
                                                                value="{!! old('site_name.en', setting()->getTranslation('site_name', 'en')) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_site_name_en') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="site_name_en_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row site name -->



                                                <!-- begin: row facebook twitter-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="facebook">{!! __('settings.facebook') !!}</label>
                                                            <input type="text" id="facebook" name="facebook"
                                                                value="{!! old('facebook', setting()->facebook) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_facebook') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="facebook_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->

                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="twitter">{!! __('settings.twitter') !!}</label>
                                                            <input type="text" id="twitter" name="twitter"
                                                                value="{!! old('twitter', setting()->twitter) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_twitter') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="twitter_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row facebook twitter -->


                                                <!-- begin: row instegram youtube-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="instegram">{!! __('settings.instegram') !!}</label>
                                                            <input type="text" id="instegram" name="instegram"
                                                                value="{!! old('instegram', setting()->instegram) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_instegram') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="instegram_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->

                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="youtube">{!! __('settings.youtube') !!}</label>
                                                            <input type="text" id="youtube" name="youtube"
                                                                value="{!! old('youtube', setting()->youtube) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_youtube') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="youtube_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row facebook twitter -->

                                            </div>
                                        </div>
                                        <!-- end: card content -->
                                    </div>
                                </div> <!-- end: card  -->
                            </div><!-- end: row  -->




                            <!-- start: row  contact info -->
                            <div class="col-md-4">
                                <div class="card">
                                    <!-- begin: card header -->
                                    <div class="card-header">
                                        <h4 class="card-title" id="basic-layout-colored-form-control">
                                            {!! __('settings.contact_section') !!}
                                        </h4>
                                    </div>
                                    <!-- end: card header -->

                                    <!-- begin: card content -->
                                    <div class="card-content collapse show">
                                        <div class="card-body">

                                            <div class="form-body">

                                                <!-- begin: row site phone-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="phone">{!! __('settings.phone') !!}</label>
                                                            <input type="text" id="phone" name="phone"
                                                                value="{!! old('phone', setting()->phone) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_phone') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="phone_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row site phone -->

                                                <!-- begin: row site mobile-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="mobile">{!! __('settings.mobile') !!}</label>
                                                            <input type="text" id="mobile" name="mobile"
                                                                value="{!! old('mobile', setting()->mobile) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_mobile') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="mobile_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row site phone -->


                                                <!-- begin: row site whatsapp-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="whatsapp">{!! __('settings.whatsapp') !!}</label>
                                                            <input type="text" id="whatsapp" name="whatsapp"
                                                                value="{!! old('whatsapp', setting()->whatsapp) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_whatsapp') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="whatsapp_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row site whatsapp -->

                                                <!-- begin: row site email-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="email">{!! __('settings.email') !!}</label>
                                                            <input type="text" id="email" name="email"
                                                                value="{!! old('email', setting()->email) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_email') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="email_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row site email -->

                                                <!-- begin: row site email support-->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="email_support">{!! __('settings.email_support') !!}</label>
                                                            <input type="text" id="email_support" name="email_support"
                                                                value="{!! old('email_support', setting()->email_support) !!}" class="form-control"
                                                                autocomplete="off" placeholder="{!! __('settings.enter_email_support') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="email_support_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row site email support -->


                                            </div>
                                        </div>
                                        <!-- end: card content -->
                                    </div>
                                </div> <!-- end: card  -->
                            </div><!-- end: row  -->


                        </div>



                        <!-- start: photo -->
                        <div class="row">
                            <!-- start: row  media settings -->
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- begin: card header -->
                                    <div class="card-header">
                                        <h4 class="card-title" id="basic-layout-colored-form-control">
                                            {!! __('settings.media_section') !!}
                                        </h4>
                                    </div>
                                    <!-- end: card header -->

                                    <!-- begin: card content -->
                                    <div class="card-content collapse show">
                                        <div class="card-body">

                                            <div class="form-body">

                                                <!-- begin: row  logo and favicon -->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="logo">{!! __('settings.logo') !!}</label>
                                                            <input type="file" name="logo" id="settings_logo"
                                                                class="form-control" accept="image/*"
                                                                placeholder="{!! __('settings.enter_logo') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="logo_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->

                                                    <!-- begin: input -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="favicon">{!! __('settings.favicon') !!}</label>
                                                            <input type="file" id="settings_favicon" name="favicon"
                                                                class="form-control" accept="image/*"
                                                                placeholder="{!! __('settings.enter_favicon') !!}">
                                                            <span class="text text-danger">
                                                                <strong id="favicon_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row   -->



                                            </div>
                                        </div>
                                        <!-- end: card content -->
                                    </div>
                                </div> <!-- end: card  -->
                            </div><!-- end: row  media settings -->
                        </div>
                        <!-- end: photo  -->





                    </section><!-- end: sections  -->
                </div><!-- end: content body  -->
            </div> <!-- end: content wrapper  -->
        </form>
    </div><!-- end: content app  -->
@endsection

@push('scripts')
    <script type="text/javascript">
        // update settings
        function resetUpdateSettings() {

            $('#site_name_ar_error').text('')
            $('#site_name_en_error').text('');
            $('#description_ar_error').text('');
            $('#description_en_error').text('');
            $('#keywords_ar_error').text('');
            $('#keywords_en_error').text('');
            $('#address_ar_error').text('');
            $('#address_en_error').text('');
            $('#phone_error').text('');
            $('#mobile_error').text('');
            $('#whatsapp_error').text('');
            $('#email_error').text('');
            $('#email_support_error').text('');
            $('#facebook_error').text('');
            $('#twitter_error').text('');
            $('#youtube_error').text('');
            $('#instegram_error').text('');
            $('#linkedin_error').text('');
            $('#favicon_error').text('');
            $('#logo_error').text('');


            $('#site_name_ar').css('border-color', '');
            $('#site_name_en').css('border-color', '');
            $('#description_ar').css('border-color', '');
            $('#description_en').css('border-color', '');
            $('#keywords_ar').css('border-color', '');
            $('#keywords_en').css('border-color', '');
            $('#address_ar').css('border-color', '');
            $('#address_en').css('border-color', '');
            $('#phone').css('border-color', '');
            $('#mobile').css('border-color', '');
            $('#whatsapp').css('border-color', '');
            $('#email').css('border-color', '');
            $('#email_support').css('border-color', '');
            $('#facebook').css('border-color', '');
            $('#twitter').css('border-color', '');
            $('#youtube').css('border-color', '');
            $('#instegram').css('border-color', '');
            $('#linkedin').css('border-color', '');
            $('#favicon').css('border-color', '');
            $('#logo').css('border-color', '');

        };


        // update settings
        $('#settings_form').on('submit', function(e) {
            e.preventDefault();
            resetUpdateSettings();
            var settings_id = "{{ setting()->id }}"
            var data = new FormData(this);
            var url = "{!! route('dashboard.settings.update', 'id') !!}".replace('id', settings_id);
            var type = $(this).attr('method');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {

                    if (data.status == true) {
                        $('.site_name_logo_section').load(location.href + ' .site_name_logo_section');
                        flasher.success("{!! __('general.update_success_message') !!}");
                    } else {
                        flasher.console.error();
                        ("{!! __('general.upload_error_message') !!}");
                    }
                }, // end success
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {

                        if (key == 'site_name.en') {
                            key = 'site_name_en';
                        } else if (key == 'site_name.ar') {
                            key = 'site_name_ar';
                        } else if (key == 'address.ar') {
                            key = 'address_ar';
                        } else if (key == 'address.en') {
                            key = 'address_en';
                        } else if (key == 'description.en') {
                            key = 'description_en';
                        } else if (key == 'description.ar') {
                            key = 'description_ar';

                        } else if (key == 'keywords.ar') {
                            key = 'keywords_ar';
                        } else if (key == 'keywords.en') {
                            key = 'keywords_en';
                        }
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            }); //end ajax

        }); // end submit




        // file input
        var lang = "{!! Lang() !!}";
        var logo = "{!! setting()->logo !!}";
        var favicon = "{!! setting()->favicon !!}";

        //logo
        $("#settings_logo").fileinput({
            theme: 'fa5',
            language: lang,
            allowedFileTypes: ['image'],
            maxFileCount: 1,
            enableResumableUpload: true,
            initialPreviewAsData: true,
            allowedFileTypes: ['image'],
            showCancel: false,
            showUpload: false,
            initialPreviewAsData: true,
            initialPreview: logo === '' ? [] : [
                "{!! asset('/uploads/settings/' . setting()->logo) !!}",
            ],
        });

        // favicon
        $("#settings_favicon").fileinput({
            theme: 'fa5',
            language: lang,
            allowedFileTypes: ['image'],
            maxFileCount: 1,
            enableResumableUpload: true,
            initialPreviewAsData: true,
            allowedFileTypes: ['image'],
            showCancel: false,
            showUpload: false,
            initialPreviewAsData: true,
            initialPreview: favicon === '' ? [] : [
                "{!! asset('/uploads/settings/' . setting()->favicon) !!}",
            ],
        });
    </script>
@endpush
