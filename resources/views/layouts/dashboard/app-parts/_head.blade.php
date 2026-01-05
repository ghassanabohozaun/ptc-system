<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="PIXINVENT">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{!! __('dashboard.dashboard') !!} | @yield('title')</title>
<link rel="apple-touch-icon" href="{!! asset('uploads/settings/' . setting()->favicon) !!}">
<link rel="shortcut icon" type="image/x-icon" href="{!! asset('uploads/settings/' . setting()->favicon) !!}">
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/fonts/line-awesome/css/line-awesome.min.css') !!}">

<link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/weather-icons/climacons.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/fonts/meteocons/style.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/charts/morris.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/charts/chartist.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/charts/chartist-plugin-tooltip.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset(path: 'assets/dashbaord/fonts/simple-line-icons/style.css') !!}">
<link rel="stylesheet" href="{!! asset('vendor/flasher/flasher.min.css') !!}" rel="stylesheet">
<link href="{!! asset('vendor/summernote/summernote-bs4.css') !!}" rel="stylesheet">


{{-- file input --}}
<link rel="stylesheet" href="{!! asset(path: 'vendor/fileInput/css/fileinput.min.css') !!}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous">
{{-- end file input --}}

<style>
    .strong-weight {
        font-size: 12px;
        font-weight: bolder;
    }
</style>

@if (Lang() == 'ar')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/vendors.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/app.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/custom-rtl.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/core/menu/menu-types/vertical-menu-modern.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/core/colors/palette-gradient.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/core/colors/palette-gradient.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/pages/timeline.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/pages/dashboard-ecommerce.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dashbaord/css-rtl/child-wizard.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/my-style.css') !!}">
@else
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/vendors.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/app.css') !!}">
    <link rel="stylesheet" type="text/css"
        href="{!! asset('assets/dashbaord') !!}/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/core/colors/palette-gradient.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/core/colors/palette-gradient.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/pages/timeline.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/pages/dashboard-ecommerce.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dashbaord/css/child-wizard.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/my-style.css') !!}">
@endif
