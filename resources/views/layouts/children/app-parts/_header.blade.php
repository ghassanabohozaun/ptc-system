 <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow     navbar-shadow"
     {{-- class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-semi-dark fixed-top navbar-shadow"> --}} {{--  --}}>
     <div class="navbar-wrapper">
         <div class="navbar-header">
             <ul class="nav navbar-nav flex-row">


                 <li class="nav-item mr-auto">
                     <a class="navbar-brand" href="{!! route('child.welcome') !!}">
                         @if (setting()->logo != null)
                             <img class="brand-logo" alt="" src="{!! asset('uploads/settings/' . setting()->logo) !!}">
                         @endif
                         <h4 class="brand-text">{!! setting()->site_name !!}</h4>
                     </a>

                     </a>


                 <li class="nav-item d-none d-md-block float-right">
                     <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                         <i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i>
                     </a>
                 </li>
                 <li class="nav-item d-md-none">
                     <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                         <i class="la la-ellipsis-v"></i>
                     </a>
                 </li>

             </ul>
         </div>
         <div class="navbar-container content">
             <div class="collapse navbar-collapse" id="navbar-mobile">
                 <!------ left-------------->
                 <ul class="nav navbar-nav mr-auto float-left">

                 </ul>
                 <!------ center-------------->
                 <ul class="nav navbar-nav mr-auto float-left">
                     @if (!child()->check())
                         <li class="nav-item">
                             <a class="nav-link" href="{!! route('child.welcome') !!}">
                                 {!! __('children.welcome') !!}
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link" href="{!! route('child.get.register') !!}">
                                 {!! __('children.new_register') !!}
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{!! route('child.get.login') !!}">
                                 {!! __('children.orphan_login') !!}
                             </a>
                         </li>
                     @endif

                     @if (child()->check())
                         <li class="nav-item">
                             <a class="nav-link" href="{!! route('child.children.show', child()->user()->id) !!}">
                                 {!! __('children.show_child') !!}
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link" href="{!! route('child.children.edit', child()->user()->id) !!}">
                                 {!! __('children.update_child') !!}
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link" href="{!! route('child.logout') !!}">
                                 {!! __('auth.logout') !!}
                             </a>
                         </li>
                     @endif

                 </ul>

                 <!------ right-------------->
                 <ul class="nav navbar-nav float-right  ">

                     {{-- dropdown-language --}}
                     <li class="dropdown dropdown-notification nav-item mx-5">
                         <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
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

                     @if (child()->check())
                         <li class="dropdown dropdown-user nav-item">
                             <a class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                 data-toggle="dropdown">
                                 <span class="mr-1">{!! __('dashboard.hello') !!}
                                     <span class="user-name text-bold-700">{!! child()->user()->getTranslation('first_name', Lang()) !!}</span>
                                 </span>
                                 @if (child()->user()->childFile->picture_of_the_orphan_child != null)
                                     <span class="avatar avatar-online">
                                         <img src="{!! asset('uploads/children/' . child()->user()->childFile->picture_of_the_orphan_child) !!}" alt="avatar">
                                         <i></i>
                                     </span>
                                 @endif
                             </a>

                             <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                     href="{!! route('child.children.edit', child()->user()->id) !!}">
                                     <i class="ft-user"></i> {!! __('children.update_child') !!}
                                 </a>


                                 <a class="dropdown-item" href="{!! route('child.logout') !!}"><i class="ft-power"></i>
                                     {!! __('auth.logout') !!}</a>

                             </div>
                         </li>
                     @endif

                 </ul>
             </div>
         </div>
     </div>
 </nav>
