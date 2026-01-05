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
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="{!! asset('uploads/settings/' . setting()->logo) !!}" alt="logo" />
                </a>
            @endif
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                <h5 class="welcome-text">Good Morning, <span class="text-black fw-bold">{!! employee()->user()->EmployeeShortName() !!}</span>
                </h5>
                <h3 class="welcome-sub-text">Your performance summary this week </h3>
            </li>
        </ul>


        <ul class="navbar-nav ms-auto">

            {{-- <!-- begin  Category -->
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown"
                   href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                    aria-labelledby="messageDropdown">
                    <a class="dropdown-item py-3">
                        <p class="mb-0 fw-medium float-start">Select category</p>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis fw-medium text-dark">Bootstrap Bundle </p>
                            <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis fw-medium text-dark">Angular Bundle</p>
                            <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular
                                projects</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis fw-medium text-dark">VUE Bundle</p>
                            <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis fw-medium text-dark">React Bundle</p>
                            <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
                        </div>
                    </a>
                </div>
            </li>
            <!-- end  Category --> --}}


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

            {{-- <!-- begin search -->
            <li class="nav-item">
                <form class="search-form" action="#">
                    <i class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="{!! __('general.search') !!}"
                        title="Search here">
                </form>
            </li>
            <!-- end search --> --}}


            <!-- begin notifications -->
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown"href="javascript:void(0)"
                    data-bs-toggle="dropdown">
                    <i class="fa fa-flag text-warning"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                    aria-labelledby="notificationDropdown">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item preview-item py-3" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <div class="preview-item-content">
                                <h6 class="preview-subject fw-normal text-dark mb-1">{{ $properties['native'] }}</h6>
                            </div>
                        </a>
                    @endforeach
                </div>
            </li>
            <!-- end notifications -->



            <!-- begin notifications -->
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown"href="javascript:void(0)"
                    data-bs-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                    aria-labelledby="notificationDropdown">
                    <a class="dropdown-item py-3 border-bottom">
                        <p class="mb-0 fw-medium float-start">You have 4 new notifications </p>
                        <span class="badge badge-pill badge-primary float-end">View all</span>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-airballoon m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject fw-normal text-dark mb-1">notify type</h6>
                            <p class="fw-light small-text mb-0"> contetn </p>
                        </div>
                    </a>
                    {{-- <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-lock-outline m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                            <p class="fw-light small-text mb-0"> Private message </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-airballoon m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                            <p class="fw-light small-text mb-0"> 2 days ago </p>
                        </div>
                    </a> --}}
                </div>
            </li>
            <!-- end notifications -->


            <!-- begin message -->
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="countDropdown"href="javascript:void(0)"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-mail icon-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                    aria-labelledby="countDropdown">
                    <a class="dropdown-item py-3">
                        <p class="mb-0 fw-medium float-start">You have 7 unread mails </p>
                        <span class="badge badge-pill badge-primary float-end">View all</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{!! asset('assets/employees/') !!}/images/faces/face10.jpg" alt="image"
                                class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis fw-medium text-dark">Name </p>
                            <p class="fw-light small-text mb-0"> Message </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{!! asset('assets/employees/') !!}/images/faces/face12.jpg" alt="image"
                                class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis fw-medium text-dark">Name </p>
                            <p class="fw-light small-text mb-0"> Message </p>
                        </div>
                    </a> --}}
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{!! asset('assets/employees/') !!}/images/faces/face1.jpg" alt="image"
                                class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis fw-medium text-dark">Name </p>
                            <p class="fw-light small-text mb-0"> Message </p>
                        </div>
                    </a>
                </div>
            </li>
            <!-- begin message -->


            <!-- begin user -->
            <li class="nav-item dropdown     user-dropdown">
                <a class="nav-link" id="UserDropdown"href="javascript:void(0)" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{!! asset('assets/employees/') !!}/images/faces/face8.jpg"
                        alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{!! asset('assets/employees/') !!}/images/faces/face8.jpg"
                            alt="Profile image">
                        <p class="mb-1 mt-3 fw-semibold">{!! employee()->user()->EmployeeShortName() !!}</p>
                        <p class="fw-light text-muted mb-0">{!! employee()->user()->email !!}</p>
                    </div>
                    <a class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>
                        {!! __('general.profile') !!}
                        <span class="badge badge-pill badge-danger">1</span>
                    </a>
                    <a class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
                        {!! __('general.messages') !!}
                        {{--   </a>
                    <a class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i>
                        Activity
                    </a>
                    <a class="dropdown-item">
                        <i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i>
                        FAQ
                    </a> --}}
                        <a href="{!! route('employees.logout') !!}" class="dropdown-item">
                            <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
                            {!! __('auth.logout') !!}
                        </a>
                </div>
            </li>
            <!-- begin user -->


        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
