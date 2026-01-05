<ul class="nav nav-tabs nav-underline nav-justified">
    <li class="nav-item">
        <a class="nav-link active" id="baseVerticalLeft1-tab1" data-toggle="tab" aria-controls="tabVerticalLeft11"
            href="#tabVerticalLeft11" aria-expanded="true">{!! __('employees.overview') !!}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="baseVerticalLeft1-tab2" data-toggle="tab" aria-controls="tabVerticalLeft12"
            href="#tabVerticalLeft12" aria-expanded="false">{!! __('employees.financial') !!}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="baseVerticalLeft1-tab3" data-toggle="tab" aria-controls="tabVerticalLeft13"
            href="#tabVerticalLeft13" aria-expanded="false">tab 3</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="baseVerticalLeft1-tab4" data-toggle="tab" aria-controls="tabVerticalLeft14"
            href="#tabVerticalLeft14" aria-expanded="false">tab 4</a>
    </li>
</ul>

<div class="tab-content px-1 pt-1">
    <!--------------------------------------- basic info ------------------------>
    <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft11" aria-expanded="true"
        aria-labelledby="baseVerticalLeft1-tab1">
        @include('dashboard/employees/employees/profile/tabs/overview')
    </div>

    <!--------------------------------------- bank info ------------------------>
    <div role="tabpanel" class="tab-pane" id="tabVerticalLeft12" aria-expanded="true"
        aria-labelledby="baseVerticalLeft1-tab2">
        @include('dashboard/employees/employees/profile/tabs/finaicail')
    </div>

    <!--------------------------------------- education info ------------------------>
    <div class="tab-pane" id="tabVerticalLeft13" aria-labelledby="baseVerticalLeft1-tab3">

    </div>

    <!--------------------------------------- job details info ------------------------>
    <div class="tab-pane" id="tabVerticalLeft14" aria-labelledby="baseVerticalLeft1-tab4">


    </div>
</div>
