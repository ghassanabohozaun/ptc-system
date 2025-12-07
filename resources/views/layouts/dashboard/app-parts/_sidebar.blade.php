    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
        <div class="main-menu-content">

            <!-- begin: Dashboard -->
            <ul class="navigation navigation-main mt-1">
                <li class=" nav-item @if (Request::is('*welcome*')) active @endif">
                    <a href="{!! route('dashboard.index') !!}">
                        <i class="icon-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.dashboard') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>
                </li>
            </ul>
            <!-- end: Dashboard -->



            <!-- begin: settings -->

            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="#">
                        <i class="icon-settings"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.settings') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>
                    <!-- begin: settings -->
                    <ul class="menu-content">
                        @can('settings')
                            <li class="@if (str_contains(url()->current(), 'settings')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.settings.index') !!}" data-i18n="nav.dash.settings">
                                    {!! __('settings.settings') !!}
                                </a>
                            </li>
                        @endcan

                    </ul>
                    <!-- end: settings -->
                </li>
            </ul>

            <!-- end: settings -->



            <!-- begin: roles -->
            @can('roles')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="icon-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.roles') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>
                        <!-- begin: roles -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'roles')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.roles.index') !!}" data-i18n="nav.dash.roles">
                                    {!! __('roles.roles') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: roles -->
                    </li>
                </ul>
            @endcan
            <!-- end: roles -->

            <!-- begin: admins -->
            @can('admins')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="icon-user"></i>
                            <span class="menu-title" data-i18n="nav.dash.admins">{!! __('dashboard.admins') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">{!! $admins_count !!}</span> --}}
                        </a>
                        <!-- begin: admins -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'admins')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.admins.index') !!}" data-i18n="nav.dash.admins">
                                    {!! __('admins.admins') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: admins -->
                    </li>
                </ul>
            @endcan
            <!-- end: admins -->


            <!-- begin: world -->
            @can('world')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="icon-flag"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.world') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>

                        <ul class="menu-content">
                            <!-- begin: governorates -->
                            <li class="@if (str_contains(url()->current(), 'governorates')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.governorates.index') !!}" data-i18n="nav.dash.governorates">
                                    {!! __('world.governorates') !!}
                                </a>
                            </li>
                            <!-- end: governorates -->

                            <!-- begin: cities -->
                            <li class="@if (str_contains(url()->current(), 'cities')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.cities.index') !!}" data-i18n="nav.dash.cities">
                                    {!! __('world.cities') !!}
                                </a>
                            </li>
                            <!-- end: cities -->
                        </ul>

                    </li>
                </ul>
            @endcan
            <!-- end: world -->


            <!-- begin: employee settings -->
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="#">
                        <i class="icon-settings"></i>
                        <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.employees_settings') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>

                    <ul class="menu-content">

                        <!-- begin: employeeStatues -->
                        @can('employeeStatuses')
                            <li class="@if (str_contains(url()->current(), 'employeeStatuses')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.employeeStatuses.index') !!}" data-i18n="nav.dash.employeeStatuses">
                                    {!! __('employees.employee_statuses') !!}
                                </a>
                            </li>
                        @endcan
                        <!-- end: employeeStatues -->

                        <!-- begin: departments -->
                        @can('departments')
                            <li class="@if (str_contains(url()->current(), 'departments')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.departments.index') !!}" data-i18n="nav.dash.departments">
                                    {!! __('departments.departments') !!}
                                </a>
                            </li>
                        @endcan
                        <!-- end: departments -->

                    </ul>

                </li>
            </ul>
            <!-- end: employee settings -->


            <!-- begin: employees -->
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="#">
                        <i class="icon-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.employees') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>

                    <ul class="menu-content">

                        @can('employees')
                            <!-- begin: employees -->
                            <li class="@if (str_contains(url()->current(), 'employees')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.employees.index') !!}" data-i18n="nav.dash.employees">
                                    {!! __('employees.employees') !!}
                                </a>
                            </li>
                            <!-- end: employees -->
                        @endcan
                        @can('dailyReports')
                            <!-- begin: daliy reports -->
                            <li class="@if (str_contains(url()->current(), 'dailyReports')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.dailyReports.index') !!}" data-i18n="nav.dash.dailyReports">
                                    {!! __('dailyReports.daily_reports') !!}
                                </a>
                            </li>
                            <!-- end: daliy reports -->
                        @endcan
                    </ul>

                </li>
            </ul>
            <!-- end: employees -->

        </div>
    </div>
