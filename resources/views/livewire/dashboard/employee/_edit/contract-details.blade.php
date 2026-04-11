<form>
    <!-- Row 1: Weekly Hours & Holidays -->
    <div class="row mt-1">
        <div class="col-md-6">
            <div class="premium-form-group">
                <label for="weekly_working_hours_and_days">{!! __('employees.weekly_working_hours_and_days') !!}</label>
                <input type="text" wire:model.live="weekly_working_hours_and_days" 
                    class="form-control premium-input @error('weekly_working_hours_and_days') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_weekly_working_hours_and_days') !!}">
                @error('weekly_working_hours_and_days')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="premium-form-group">
                <label for="holidays_and_festivals">{!! __('employees.holidays_and_festivals') !!}</label>
                <input type="text" wire:model.live="holidays_and_festivals" 
                    class="form-control premium-input @error('holidays_and_festivals') is-invalid-premium @enderror" 
                    placeholder="{!! __('employees.enter_holidays_and_festivals') !!}">
                @error('holidays_and_festivals')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Row 2: Job Duties (Rich Text) -->
    <div class="row">
        <div class="col-md-12">
            <div class="premium-form-group" wire:ignore x-data x-init="$nextTick(() => {
                $('#job_duties_summernote').summernote({
                    placeholder: '{!! __('general.write_here') !!}',
                    tabsize: 2,
                    height: 250,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks: {
                        onChange: function(contents) {
                            $wire.set('job_duties', contents);
                        }
                    }
                });
            });">
                <label for="job_duties" class="mb-2 d-block">{!! __('employees.job_duties') !!}</label>
                <textarea id="job_duties_summernote" rows="12" class="form-control premium-input shadow-none">{!! $job_duties !!}</textarea>
            </div>
            @error('job_duties')
                <span class="error-message-premium mt-n2 mb-3 d-block">
                    <i class="la la-info-circle"></i> {!! $message !!}
                </span>
            @enderror
        </div>
    </div>

    <!-- Row 3: Contract Terms (Rich Text) -->
    <div class="row">
        <div class="col-md-12">
            <div class="premium-form-group" wire:ignore x-data x-init="$nextTick(() => {
                $('#contract_terms_summernote').summernote({
                    placeholder: '{!! __('general.write_here') !!}',
                    tabsize: 2,
                    height: 250,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks: {
                        onChange: function(contents) {
                            $wire.set('contract_terms', contents);
                        }
                    }
                });
            });">
                <label for="contract_terms" class="mb-2 d-block">{!! __('employees.contract_terms') !!}</label>
                <textarea id="contract_terms_summernote" rows="12" class="form-control premium-input shadow-none">{!! $contract_terms !!}</textarea>
            </div>
            @error('contract_terms')
                <span class="error-message-premium mt-n2 mb-3 d-block">
                    <i class="la la-info-circle"></i> {!! $message !!}
                </span>
            @enderror
        </div>
    </div>

    <!-- Row 4: Education & Experience Contracts -->
    <div class="row">
        <div class="col-md-6">
            <div class="premium-form-group">
                <label for="education_contract">{!! __('employees.education_contract') !!}</label>
                <input type="text" wire:model.live="education_contract" 
                    class="form-control premium-input @error('education_contract') is-invalid-premium @enderror" 
                    placeholder="{!! __('employees.enter_education_contract') !!}">
                @error('education_contract')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="premium-form-group">
                <label for="experiences_contract">{!! __('employees.experiences_contract') !!}</label>
                <input type="text" wire:model.live="experiences_contract" 
                    class="form-control premium-input @error('experiences_contract') is-invalid-premium @enderror" 
                    placeholder="{!! __('employees.enter_experiences_contract') !!}">
                @error('experiences_contract')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Row 5: Other Requirements (Rich Text) -->
    <div class="row">
        <div class="col-md-12">
            <div class="premium-form-group" wire:ignore x-data x-init="$nextTick(() => {
                $('#other_requirements_summernote').summernote({
                    placeholder: '{!! __('general.write_here') !!}',
                    tabsize: 2,
                    height: 100,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks: {
                        onChange: function(contents) {
                            $wire.set('other_requirements', contents);
                        }
                    }
                });
            });">
                <label for="other_requirements" class="mb-2 d-block">{!! __('employees.other_requirements') !!}</label>
                <textarea id="other_requirements_summernote" rows="2" class="form-control premium-input shadow-none">{!! $other_requirements !!}</textarea>
            </div>
            @error('other_requirements')
                <span class="error-message-premium mt-n2 d-block">
                    <i class="la la-info-circle"></i> {!! $message !!}
                </span>
            @enderror
        </div>
    </div>

    <!-- Final Save Button -->
    <div class="row mt-3">
        <div class="col-md-12 text-right">
            <button type="button" wire:click="submitContractDetailsForm" class="btn btn-premium-add px-4">
                <i class="la la-save mr-1"></i>
                {!! __('employees.save') !!}
                <span wire:loading wire:target="submitContractDetailsForm">
                    <i class="la la-refresh la-spin ml-1"></i>
                </span>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>
</form>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('reinit-summernote', (event) => {
            $('#job_duties_summernote').summernote('code', $wire.get('job_duties'));
            $('#contract_terms_summernote').summernote('code', $wire.get('contract_terms'));
            $('#other_requirements_summernote').summernote('code', $wire.get('other_requirements'));
        });
    });
</script>
