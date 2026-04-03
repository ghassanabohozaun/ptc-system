<form>
    <!-- begin: row 1 -->
    <div class="row mt-1">
        <!-- begin: input -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="weekly_working_hours_and_days">{!! __('employees.weekly_working_hours_and_days') !!}</label>
                <input type="text" wire:model.live="weekly_working_hours_and_days" class="form-control"
                    autocomplete="off" placeholder="{!! __('employees.enter_weekly_working_hours_and_days') !!}"
                    @error('weekly_working_hours_and_days')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('weekly_working_hours_and_days')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="holidays_and_festivals">{!! __('employees.holidays_and_festivals') !!}</label>
                <input type="text" wire:model.live="holidays_and_festivals" class="form-control" autocomplete
                    placeholder="{!! __('employees.enter_holidays_and_festivals') !!}"
                    @error('holidays_and_festivals')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('holidays_and_festivals')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->
    </div>
    <!-- end: row 1 -->

    <!-- begin: row 2 (Job Duties) -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" wire:ignore x-data x-init="$nextTick(() => {
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
                <label for="job_duties">{!! __('employees.job_duties') !!}</label>
                <textarea id="job_duties_summernote" rows="12" class="form-control job_duties_summernote"
                    placeholder="{!! __('employees.enter_job_duties') !!}">{!! $job_duties !!}</textarea>
            </div>
            @error('job_duties')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: row 2 -->

    <!-- begin: row 3 (Contract Terms) -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" wire:ignore x-data x-init="$nextTick(() => {
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
                <label for="contract_terms">{!! __('employees.contract_terms') !!}</label>
                <textarea id="contract_terms_summernote" rows="12" class="form-control contract_terms_summernote"
                    placeholder="{!! __('employees.enter_contract_terms') !!}">{!! $contract_terms !!}</textarea>
            </div>
            @error('contract_terms')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: row 3 -->

    <!-- begin: row 4 -->
    <div class="row">
        <!-- begin: input -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="education_contract">{!! __('employees.education_contract') !!}</label>
                <input type="text" wire:model.live="education_contract" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_education_contract') !!}"
                    @error('education_contract')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('education_contract')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="experiences_contract">{!! __('employees.experiences_contract') !!}</label>
                <input type="text" wire:model.live="experiences_contract" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_experiences_contract') !!}"
                    @error('experiences_contract')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('experiences_contract')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->
    </div>
    <!-- end: row 4 -->

    <!-- begin: row 5 (Other Requirements) -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" wire:ignore x-data x-init="$nextTick(() => {
                $('#other_requirements_summernote').summernote({
                    placeholder: '{!! __('general.write_here') !!}',
                    tabsize: 2,
                    height: 50,
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
                            $wire.set('other_requirements', contents);
                        }
                    }
                });
            });">
                <label for="other_requirements">{!! __('employees.other_requirements') !!}</label>
                <textarea id="other_requirements_summernote" rows="2" class="form-control other_requirements_summernote"
                    placeholder="{!! __('employees.enter_other_requirements') !!}">{!! $other_requirements !!}</textarea>
            </div>
            @error('other_requirements')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: row 5 -->

    <!-- begin: button -->
    <div class="row {!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!} mt-3">
        <div class="col-md-12">
            <button type="button" wire:click ="submitContractDetailsForm" class="btn btn-primary  btn-glow">
                {!! __('employees.save') !!}
                <span wire:loading wire:target="submitContractDetailsForm">
                    <i class="la la-refresh spinner">
                    </i>
                </span>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- end: button -->
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
