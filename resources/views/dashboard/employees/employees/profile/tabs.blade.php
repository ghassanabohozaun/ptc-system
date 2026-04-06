<div class="ios-segmented-tabs-wrapper">
    <ul class="nav nav-tabs ios-segmented-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
                href="#tab1" aria-expanded="true">
                <i class="la la-user"></i> {!! __('employees.overview') !!}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2"
                href="#tab2" aria-expanded="false">
                <i class="la la-money"></i> {!! __('employees.financial') !!}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3"
                href="#tab3" aria-expanded="false">
                <i class="la la-file-text"></i> {!! __('employees.contract_details') !!}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4"
                href="#tab4" aria-expanded="false">
                <i class="la la-folder-open"></i> {!! __('employees.contracts') ?? 'العقود' !!}
            </a>
        </li>
    </ul>
</div>

<div class="tab-content">
    <!--------------------------------------- Overview ------------------------>
    <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
        @include('dashboard/employees/employees/profile/tabs/overview')
    </div>

    <!--------------------------------------- Financial ------------------------>
    <div role="tabpanel" class="tab-pane" id="tab2" aria-labelledby="base-tab2">
        @include('dashboard/employees/employees/profile/tabs/finaicail')
    </div>

    <!--------------------------------------- Contract Details ------------------------>
    <div role="tabpanel" class="tab-pane" id="tab3" aria-labelledby="base-tab3">
        @include('dashboard/employees/employees/profile/tabs/contract')
    </div>

    <!--------------------------------------- Contracts Table ------------------------>
    <div role="tabpanel" class="tab-pane" id="tab4" aria-labelledby="base-tab4">
        @include('dashboard/employees/employees/profile/tabs/employee_contracts')
    </div>
</div>

