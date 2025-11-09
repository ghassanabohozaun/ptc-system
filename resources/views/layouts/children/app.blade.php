<!DOCTYPE html>
<html class="loading"
    @if (Config::get('app.locale') == 'ar') lang="ar" data-textdirection="rtl" @else  lang="en" data-textdirection="ltr" @endif>

<head>
    @include('layouts.dashboard.app-parts._head')
    <style>
        .header-navbar .navbar-container ul.nav li a.dropdown-user-link {
            padding: 1.8rem 1rem;
            line-height: 23px;
        }
    </style>
    @stack('style')
</head>

<body class="vertical-layout vertical-menu-modern" style="font-family: 'Tajawal', sans-serif;">

    @include('layouts.children.app-parts._header')


    @yield('content')

    {{-- @include('layouts.dashboard.app-parts._footer') --}}
    @include('layouts.dashboard.app-parts._scripts')
    @stack('scripts')
</body>

</html>
