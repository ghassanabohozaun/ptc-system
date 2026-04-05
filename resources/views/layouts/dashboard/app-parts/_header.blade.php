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
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0)"
                            data-toggle="dropdown">
                            <span class="mr-1">{!! __('dashboard.hello') !!}
                                <span class="user-name text-bold-700">{!! admin()->user()->getTranslation('name', Lang()) !!}</span>
                            </span>
                            @php
                                $user = admin()->user();
                                $photoUrl = $user->adminPhoto();
                                $colors = ['#5A8DEE', '#FDAC41', '#FF5B5C', '#39DA8A', '#00CFDD', '#7117EA', '#272727'];
                                $charIndex = abs(crc32($user->name)) % count($colors);
                                $bgColor = $colors[$charIndex];
                            @endphp
                            <span class="avatar avatar-online">
                                @if ($photoUrl)
                                    <img src="{!! $photoUrl !!}" alt="avatar">
                                @else
                                    <span class="rounded-circle d-flex align-items-center justify-content-center text-white"
                                        style="width: 30px; height: 30px; background-color: {!! $bgColor !!}; font-size: 11px; font-weight: 600; text-transform: uppercase;">
                                        {!! $user->initials !!}
                                    </span>
                                @endif
                                <i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                href="javascript:void(0)"><i class="ft-user"></i>{!! __('dashboard.profile') !!}</a>
                            <a class="dropdown-item" href="{!! route('dashboard.lock.screen') !!}">
                                <i class="la la-lock"></i>
                                {!! __('dashboard.lock_screen') !!}
                            </a>
                            <a class="dropdown-item" href="{!! route('dashboard.logout') !!}">
                                <i class="ft-power"></i>
                                {!! __('auth.logout') !!}
                            </a>

                        </div>
                    </li>

                    {{-- dropdown-language --}}
                    <li class="dropdown dropdown-notification nav-item" style="margin-top: -5px">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="javascript:void(0)"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Config::get('app.locale') == 'ar')
                                <img class="flag-icon"
                                    src="{{ asset('assets/dashbaord/media/svg/flags/العربية.svg') }}" />
                            @else
                                <img class="flag-icon"
                                    src="{{ asset('assets/dashbaord/media/svg/flags/English.svg') }}" />
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <i class="flag-icon">
                                        <img src="{{ asset('assets/dashbaord/media/svg/flags/' . $properties['native'] . '.svg') }}"
                                            alt="" />
                                    </i>
                                    <span style="padding: 10px">
                                        {{ $properties['native'] }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </li>

                    <livewire:dashboard.notification />
                    <livewire:message-notification guard="admin" iconClass="ficon ft-mail" />
                </ul>
            </div>
        </div>
    </div>
</nav>
