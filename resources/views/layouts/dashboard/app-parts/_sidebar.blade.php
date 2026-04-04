    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
        <div class="main-menu-content">

            <ul class="navigation navigation-main mt-3" id="main-menu-navigation" data-menu="menu-navigation">
                <!-- begin: Dashboard -->
                <li class=" nav-item @if (Request::is('*welcome*')) active @endif">
                    <a href="{!! route('dashboard.index') !!}">
                        <i class="icon-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.dashboard') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>
                </li>
            <!-- end: Dashboard -->

            <!-- begin: settings -->
                <li class=" nav-item">
                    <a href="javascript:void(0)">
                        <i class="icon-settings"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.settings') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>
                    <!-- begin: settings -->
                    <ul class="menu-content">
                        @can('settings')
                            <li class="@if (Request::routeIs('dashboard.settings.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.settings.index') !!}" data-i18n="nav.dash.settings">
                                    {!! __('settings.settings') !!}
                                </a>
                            </li>
                        @endcan

                    </ul>
                    <!-- end: settings -->
                </li>
            <!-- end: settings -->

            <!-- begin: roles -->
            @can('roles')
                    <li class=" nav-item">
                        <a href="javascript:void(0)">
                            <i class="icon-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.roles') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>
                        <!-- begin: roles -->
                        <ul class="menu-content">
                            <li class="@if (Request::routeIs('dashboard.roles.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.roles.index') !!}" data-i18n="nav.dash.roles">
                                    {!! __('roles.roles') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: roles -->
                    </li>
            @endcan
            <!-- end: roles -->

            <!-- begin: admins -->
            @can('admins')
                    <li class=" nav-item">
                        <a href="javascript:void(0)">
                            <i class="icon-user"></i>
                            <span class="menu-title" data-i18n="nav.dash.admins">{!! __('dashboard.admins') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">{!! $admins_count !!}</span> --}}
                        </a>
                        <!-- begin: admins -->
                        <ul class="menu-content">
                            <li class="@if (Request::routeIs('dashboard.admins.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.admins.index') !!}" data-i18n="nav.dash.admins">
                                    {!! __('admins.admins') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: admins -->
                    </li>
            @endcan
            <!-- end: admins -->

            <!-- begin: world -->
            @can('world')
                    <li class=" nav-item">
                        <a href="javascript:void(0)">
                            <i class="icon-flag"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.world') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>

                        <ul class="menu-content">
                            <!-- begin: governorates -->
                            <li class="@if (Request::routeIs('dashboard.governorates.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.governorates.index') !!}" data-i18n="nav.dash.governorates">
                                    {!! __('world.governorates') !!}
                                </a>
                            </li>
                            <!-- end: governorates -->

                            <!-- begin: cities -->
                            <li class="@if (Request::routeIs('dashboard.cities.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.cities.index') !!}" data-i18n="nav.dash.cities">
                                    {!! __('world.cities') !!}
                                </a>
                            </li>
                            <!-- end: cities -->
                        </ul>

                    </li>
            @endcan
            <!-- end: world -->

            <!-- begin: employee settings -->
                <li class=" nav-item">
                    <a href="javascript:void(0)">
                        <i class="icon-settings"></i>
                        <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.employees_settings') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>

                    <ul class="menu-content">

                        <!-- begin: employeeStatues -->
                        @can('employeeStatuses')
                            <li class="@if (Request::routeIs('dashboard.employeeStatuses.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.employeeStatuses.index') !!}" data-i18n="nav.dash.employeeStatuses">
                                    {!! __('employees.employee_statuses') !!}
                                </a>
                            </li>
                        @endcan
                        <!-- end: employeeStatues -->

                        <!-- begin: departments -->
                        @can('departments')
                            <li class="@if (Request::routeIs('dashboard.departments.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.departments.index') !!}" data-i18n="nav.dash.departments">
                                    {!! __('departments.departments') !!}
                                </a>
                            </li>
                        @endcan
                        <!-- end: departments -->

                    </ul>

                </li>
            <!-- end: employee settings -->

            <!-- begin: employees -->
                <li class=" nav-item">
                    <a href="javascript:void(0)">
                        <i class="icon-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.employees') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>

                    <ul class="menu-content">

                        @can('employees')
                            <!-- begin: employees -->
                            <li class="@if (Request::routeIs('dashboard.employees.*') && !Request::routeIs('dashboard.employees.reports.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.employees.index') !!}" data-i18n="nav.dash.employees">
                                    {!! __('employees.employees') !!}
                                </a>
                            </li>
                            <!-- end: employees -->

                            <!-- begin: employees export -->
                            <li class="@if (Request::routeIs('dashboard.employees.reports.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.employees.reports.show') !!}" data-i18n="nav.dash.employees_export">
                                    {!! __('employees.employees_export') !!}
                                </a>
                            </li>
                            <!-- end: employees export-->
                        @endcan
                        @can('dailyReports')
                            <!-- begin: daliy reports -->
                            <li class="@if (Request::routeIs('dashboard.dailyReports.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.dailyReports.index') !!}" data-i18n="nav.dash.dailyReports">
                                    {!! __('dailyReports.daily_reports') !!}
                                </a>
                            </li>
                            <!-- end: daliy reports -->
                        @endcan

                        @can('monthlyReports')
                            <!-- begin: monthly reports -->
                            <li class="@if (Request::routeIs('dashboard.monthlyReports.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.monthlyReports.index') !!}" data-i18n="nav.dash.monthlyReports">
                                    {!! __('monthlyReports.monthly_reports') !!}
                                </a>
                            </li>
                            <!-- end: monthly reports -->
                        @endcan
                        <!-- begin: employee contracts -->
                        <li class="@if (Request::routeIs('dashboard.employeeContracts.*')) active @endif">
                            <a class="menu-item" href="{!! route('dashboard.employeeContracts.index') !!}" data-i18n="nav.dash.employeeContracts">
                                {!! __('employeeContracts.employee_contracts') !!}
                            </a>
                        </li>
                        <!-- end: employee contracts -->
                    </ul>


                </li>
            <!-- end: employees -->

            <!-- begin: salaries -->
                <li class=" nav-item">
                    <a href="javascript:void(0)">
                        <i class="icon-wallet"></i>
                        <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.salaries') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>

                    <ul class="menu-content">

                        @can('salaries')
                            <!-- begin: salaries -->
                            <li class="@if (Request::routeIs('dashboard.salaries.*')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.salaries.index') !!}" data-i18n="nav.dash.salaries">
                                    {!! __('salaries.salaries') !!}
                                </a>
                            </li>
                            <!-- end: salaries -->
                        @endcan
                    </ul>

                </li>
            <!-- end: salaries -->

            <!-- begin: messages -->
            @can('messages')
                    <li class="nav-item @if (Request::routeIs('dashboard.messages.*')) active @endif">
                        <a href="{!! route('dashboard.messages.index') !!}">
                            <i class="icon-envelope"></i>
                            <span class="menu-title" data-i18n="nav.dash.messages">{!! __('messages.messages') !!}</span>
                        </a>
                    </li>
            @endcan
            <!-- end: messages -->
            </ul>
        </div>
    </div>
