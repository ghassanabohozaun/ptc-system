<div>
    @if (!empty($statusAlert))
        <div class="container-fluid mt-2 mb-2 ">
            <div class="alert {!! $statusAlert['type'] !!}">
                {!! $statusAlert['message'] !!}
            </div>
        </div>
    @endif

    <div class="premium-tabs-wrapper">
        <ul class="premium-tabs">
            <li class="premium-tab-item">
                <button class="premium-tab-link {!! $currentStep == 1 ? 'active' : '' !!}" wire:click="basicClick">
                    <i class="la la-user"></i>
                    <span>{!! __('employees.basic') !!}</span>
                </button>
            </li>
            <li class="premium-tab-item">
                <button class="premium-tab-link {!! $currentStep == 2 ? 'active' : '' !!}" wire:click="educationClick">
                    <i class="la la-graduation-cap"></i>
                    <span>{!! __('employees.education') !!}</span>
                </button>
            </li>
            <li class="premium-tab-item">
                <button class="premium-tab-link {!! $currentStep == 3 ? 'active' : '' !!}" wire:click="JobDetailsClick">
                    <i class="la la-briefcase"></i>
                    <span>{!! __('employees.job_details') !!}</span>
                </button>
            </li>
            <li class="premium-tab-item">
                <button class="premium-tab-link {!! $currentStep == 4 ? 'active' : '' !!}" wire:click="ContractDetailsClick">
                    <i class="la la-file-text"></i>
                    <span>{!! __('employees.contract_details') !!}</span>
                </button>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane {!! $currentStep == 1 ? 'active' : '' !!} step-content-fade">
            @include('livewire.dashboard.employee._edit.basic')
        </div>
        <div class="tab-pane {!! $currentStep == 2 ? 'active' : '' !!} step-content-fade">
            @include('livewire.dashboard.employee._edit.education')
        </div>
        <div class="tab-pane {!! $currentStep == 3 ? 'active' : '' !!} step-content-fade">
            @include('livewire.dashboard.employee._edit.job-details')
        </div>
        <div class="tab-pane {!! $currentStep == 4 ? 'active' : '' !!} step-content-fade">
            @include('livewire.dashboard.employee._edit.contract-details')
        </div>
    </div>


</div>
