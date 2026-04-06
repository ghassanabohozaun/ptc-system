<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-light fixed-top navbar-shadow"
    {{-- class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-semi-dark fixed-top navbar-shadow"> --}} {{--  --}}>
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                        href="javascript:void(0)"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto site_name_logo_section">
                    <a class="navbar-brand" href="javascript:void(0)">
                        @if (setting()->logo != null)
                            <img class="brand-logo" alt="" src="{!! asset('uploads/settings/' . setting()->logo) !!}">
                        @else
                            {{-- <h4 class="brand-text">{!! setting()->site_name !!}</h4> --}}
                        @endif
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0"
                        data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white"
                            data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                </ul>

                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item admin_name_section">
                        <a class="dropdown-toggle nav-link dropdown-user-link p-0" href="javascript:void(0)"
                            data-toggle="dropdown">
                            <div class="premium-user-pill">
                                <div class="user-info-text d-none d-lg-flex">
                                    <span class="greeting-text">{!! __('dashboard.hello') !!}</span>
                                    <span class="user-name-text">{!! admin()->user()->getTranslation('name', Lang()) !!}</span>
                                </div>
                                @php
                                    $user = admin()->user();
                                    $photoUrl = $user->adminPhoto();
                                    $colors = ['#5A8DEE', '#FDAC41', '#FF5B5C', '#39DA8A', '#00CFDD', '#7117EA', '#272727'];
                                    $charIndex = abs(crc32($user->name)) % count($colors);
                                    $bgColor = $colors[$charIndex];
                                @endphp
                                <div class="avatar-wrapper-premium">
                                    @if ($photoUrl)
                                        <img src="{!! $photoUrl !!}" alt="avatar"
                                            class="avatar-img-premium shadow-sm">
                                    @else
                                        <span class="avatar-initials-premium shadow-sm"
                                            style="background: linear-gradient(135deg, {!! $bgColor !!}, {!! $bgColor !!}dd);">
                                            {!! $user->initials !!}
                                        </span>
                                    @endif
                                    <span class="avatar-status-online"></span>
                                </div>
                                <i class="la la-angle-down ml-1 chevron-icon d-none d-lg-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header text-center pb-2 border-bottom mb-1 d-md-none">
                                <h6 class="text-bold-700 mb-0">{!! admin()->user()->name !!}</h6>
                            </div>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ft-user"></i> {!! __('dashboard.profile') !!}
                            </a>
                            <a class="dropdown-item" href="{!! route('dashboard.lock.screen') !!}">
                                <i class="la la-lock"></i> {!! __('dashboard.lock_screen') !!}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{!! route('dashboard.logout') !!}">
                                <i class="ft-power"></i> {!! __('auth.logout') !!}
                            </a>
                        </div>
                    </li>

                    {{-- Premium Language Switcher Toggle --}}
                    @php
                        $currentLocale = Lang();
                        $targetLocale = $currentLocale == 'ar' ? 'en' : 'ar';
                        $targetNative = LaravelLocalization::getSupportedLocales()[$targetLocale]['native'];
                        $flagPath =
                            $targetLocale == 'ar'
                                ? asset('assets/dashbaord/media/svg/flags/العربية.svg')
                                : asset('assets/dashbaord/media/svg/flags/English.svg');
                    @endphp
                    <li class="nav-item">
                        <a href="{{ LaravelLocalization::getLocalizedURL($targetLocale, null, [], true) }}"
                            class="nav-link p-0 d-flex align-items-center h-100">
                            <div class="language-switcher-premium">
                                <img src="{!! $flagPath !!}" class="flag-icon" alt="{!! $targetNative !!}">
                                <span class="lang-name">{{ $targetNative }}</span>
                            </div>
                        </a>
                    </li>

                    <livewire:dashboard.notification />
                    <livewire:message-notification guard="admin" iconClass="ficon ft-mail" />
                </ul>
            </div>
        </div>
    </div>
</nav>
