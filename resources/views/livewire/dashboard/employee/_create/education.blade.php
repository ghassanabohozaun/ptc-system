<div class="table-responsive">
    <table class="table table-borderless">
        <thead class="bg-light">
            <tr>
                <th class="border-top-0 px-2 py-1 text-center" style="width: 28%">{!! __('employees.educational_instituation_name') !!}</th>
                <th class="border-top-0 px-2 py-1 text-center" style="width: 22%">{!! __('employees.education_specialization') !!}</th>
                <th class="border-top-0 px-2 py-1 text-center" style="width: 15%">{!! __('employees.level_and_year') !!}</th>
                <th class="border-top-0 px-2 py-1 text-center" style="width: 25%">{!! __('employees.certification') !!}</th>
                <th class="border-top-0 px-2 py-1 text-center" style="width: 10%">
                    <button type="button" wire:click.prevent="addNewEducation" class="btn btn-premium-add btn-sm">
                        <i class="la la-plus"></i>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($educationItems as $index => $row)
                <tr wire:key="row-{{ $index }}" class="border-bottom">
                    <td class="p-2">
                        <input type="hidden" wire:model="educationItems.{!! $index !!}.id">
                        
                        <div class="premium-form-group mb-1">
                            <input type="text"
                                wire:model="educationItems.{!! $index !!}.educational_instituation_name_ar"
                                class="form-control premium-input @error('educationItems.' . $index . '.educational_instituation_name_ar') is-invalid-premium @enderror" 
                                placeholder="{!! __('employees.enter_educational_instituation_name_ar') !!}">
                        </div>

                        <div class="premium-form-group mb-0">
                            <input type="text"
                                wire:model="educationItems.{!! $index !!}.educational_instituation_name_en"
                                class="form-control premium-input @error('educationItems.' . $index . '.educational_instituation_name_en') is-invalid-premium @enderror" 
                                placeholder="{!! __('employees.enter_educational_instituation_name_en') !!}">
                        </div>
                    </td>

                    <td class="p-2">
                        <div class="premium-form-group mb-1">
                            <input type="text"
                                wire:model="educationItems.{!! $index !!}.education_specialization_ar"
                                class="form-control premium-input @error('educationItems.' . $index . '.education_specialization_ar') is-invalid-premium @enderror" 
                                placeholder="{!! __('employees.enter_education_specialization_ar') !!}">
                        </div>

                        <div class="premium-form-group mb-0">
                            <input type="text"
                                wire:model="educationItems.{!! $index !!}.education_specialization_en"
                                class="form-control premium-input @error('educationItems.' . $index . '.education_specialization_en') is-invalid-premium @enderror" 
                                placeholder="{!! __('employees.enter_education_specialization_en') !!}">
                        </div>
                    </td>

                    <td class="p-2 text-center">
                        <div class="premium-form-group mb-1">
                            <select wire:model="educationItems.{!! $index !!}.education_level"
                                class="form-control premium-input @error('educationItems.' . $index . '.education_level') is-invalid-premium @enderror">
                                <option value="" selected>{!! __('employees.level') !!}</option>
                                <option value="phd">{!! __('employees.phd') !!}</option>
                                <option value="masters">{!! __('employees.masters') !!}</option>
                                <option value="university">{!! __('employees.university') !!}</option>
                                <option value="deplom">{!! __('employees.deplom') !!}</option>
                                <option value="preparatory">{!! __('employees.preparatory') !!}</option>
                                <option value="secondary">{!! __('employees.secondary') !!}</option>
                                <option value="etc">{!! __('employees.etc') !!}</option>
                            </select>
                        </div>
                        <div class="premium-form-group mb-0">
                            <input type="number" wire:model="educationItems.{!! $index !!}.education_year"
                                class="form-control premium-input @error('educationItems.' . $index . '.education_year') is-invalid-premium @enderror" 
                                placeholder="{!! __('employees.year') !!}">
                        </div>
                    </td>

                    <td class="p-2">
                        <div class="premium-photo-container">
                            <input type="file" wire:model="educationItems.{!! $index !!}.certification"
                                accept="image/*" class="form-control-file">
                        </div>

                        @if ($row['certification'])
                            <div class="mt-2 text-center">
                                <img src="{!! $row['certification']->temporaryUrl() !!}" 
                                    class="premium-photo-preview" style="border-radius: 8px; width: 60px; height: 60px" />
                            </div>
                        @endif
                    </td>

                    <td class="p-2 text-center align-middle">
                        <button type="button" wire:click.prevent="removeEducation({{ $index }})"
                            class="btn btn-outline-danger btn-sm border-0">
                            <i class="la la-trash-o" style="font-size: 1.4rem"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row mt-3">
    <div class="col-md-12 text-right">
        <button type="button" wire:click="submitEducationForm" class="btn btn-premium-add px-4">
            <i class="la la-save mr-1"></i>
            {!! __('employees.save') !!}
            <span wire:loading wire:target="submitEducationForm">
                <i class="la la-refresh la-spin ml-1"></i>
            </span>
        </button>
    </div>
</div>
<div class="clearfix"></div>
