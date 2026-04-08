<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            @if (setting()->logo)
                <a class="navbar-brand brand-logo" href="{!! route('employees.overview') !!}">
                    <img src="{!! asset('uploads/settings/' . setting()->logo) !!}" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{!! route('employees.overview') !!}">
                    <img src="{!! asset('uploads/settings/' . setting()->logo) !!}" alt="logo" />
                </a>
            @endif
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                <h5 class="welcome-text">{!! greeting() !!}, <span
                        class="text-black fw-bold">{!! employee()->user()->EmployeeShortName() !!}</span>
                </h5>
                {{-- <h3 class="welcome-sub-text">{!! __('general.your_performance_summary_this_week') !!} </h3> --}}
            </li>
        </ul>


        <ul class="navbar-nav ms-auto">

            <!-- begin  calendar -->
            <li class="nav-item d-none d-lg-block">
                <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                    <span class="input-group-addon input-group-prepend border-right">
                        <span class="icon-calendar input-group-text calendar-icon"></span>
                    </span>
                    <input type="text" class="form-control">
                </div>
            </li>
            <!-- end  calendar -->

            <!-- begin user -->
            <li class="nav-item dropdown user-dropdown">
                <a class="nav-link p-0" id="UserDropdown" href="javascript:void(0)" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="premium-user-pill">
                        <div class="user-info-text d-none d-lg-flex">
                            <span class="greeting-text">{!! __('dashboard.hello') !!}</span>
                            <span class="user-name-text">{!! employee()->user()->first_name !!}</span>
                        </div>
                        @php
                            $user = employee()->user();
                            $photoUrl = $user->photo ? asset('uploads/employeesPhotos/' . $user->photo) : null;
                            $colors = ['#5A8DEE', '#FDAC41', '#FF5B5C', '#39DA8A', '#00CFDD', '#7117EA', '#272727'];
                            $charIndex = abs(crc32($user->first_name)) % count($colors);
                            $bgColor = $colors[$charIndex];
                        @endphp
                        <div class="avatar-wrapper-premium">
                            @if ($photoUrl)
                                <img src="{!! $photoUrl !!}" alt="avatar" class="avatar-img-premium shadow-sm">
                            @else
                                <span class="avatar-initials-premium shadow-sm"
                                    style="background: linear-gradient(135deg, {!! $bgColor !!}, {!! $bgColor !!}dd);">
                                    {!! $user->initials !!}
                                </span>
                            @endif
                        </div>
                        <i class="mdi mdi-chevron-down ml-1 chevron-icon d-none d-lg-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <p class="mb-1 mt-3 fw-semibold">{!! employee()->user()->EmployeeShortName() !!}</p>
                        <p class="fw-light text-muted mb-0">{!! employee()->user()->email !!}</p>
                    </div>
                    <a class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>
                        {!! __('general.profile') !!}
                    </a>
                    <a class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
                        {!! __('general.messages') !!}
                    </a>
                    <a href="{!! route('employees.logout') !!}" class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
                        {!! __('auth.logout') !!}
                    </a>
                </div>
            </li>
            <!-- begin user -->

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

            <!-- begin notifications -->
            <livewire:dashboard.notification />
            <!-- end notifications -->

            <!-- begin message -->
            <livewire:message-notification guard="employee" iconClass="icon-mail icon-lg" />
            <!-- begin message -->

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
