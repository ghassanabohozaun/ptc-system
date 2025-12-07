<div>
    <ul class="nav nav-tabs nav-underline no-hover-bg">
        <li class="nav-item" wire:click ="basicClick">
            <a class="nav-link {!! $currentStep == 1 ? 'active' : '' !!}">{!! __('employees.basic') !!}</a>
        </li>
        <li class="nav-item" wire:click ="educationClick">
            <a class="nav-link {!! $currentStep == 2 ? 'active' : '' !!}">{!! __('employees.education') !!}</a>
        </li>
        <li class="nav-item" wire:click ="JobDetailsClick">
            <a class="nav-link {!! $currentStep == 3 ? 'active' : '' !!}">{!! __('employees.job_details') !!}</a>
        </li>
    </ul>

    <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane {!! $currentStep == 1 ? 'active' : '' !!}">
            @include('livewire.dashboard.employee._create.basic')
        </div>
        <div class="tab-pane {!! $currentStep == 2 ? 'active' : '' !!}" aria-labelledby="base-education">
            @include('livewire.dashboard.employee._create.education')
        </div>
        <div class="tab-pane {!! $currentStep == 3 ? 'active' : '' !!}" aria-labelledby="base-job-details">
            @include('livewire.dashboard.employee._create.job-details')
        </div>

    </div>

</div>
