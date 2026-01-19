<div class="table_responsive">

    <table class="table">
        <thead>
            <tr>
                <th>
                    {!! __('employees.educational_instituation_name') !!}
                </th>
                <th>
                    {!! __('employees.education_specialization') !!}
                </th>
                <th>
                    {!! __('employees.education_year') !!}
                </th>
                <th>
                    {!! __('employees.education_level') !!}
                </th>
                <th>
                    {!! __('employees.certification') !!}
                </th>
                <th> {!! __('employees.certification') !!}</th>
                <th>
                    <a href="javascript:void(0)" wire:click.prevent="addNewEducation" class="text-white badge badge-info">
                        <li class="la la-plus"></li>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($educationItems as $index => $row)
                <tr wire:key="row-{{ $index }}">

                    <td class="col-lg-3 col-md-3 col-sm-12">
                        <input type="hidden" wire:model="educationItems.{!! $index !!}.id" class="form-control">

                        <input type="text"
                            wire:model="educationItems.{!! $index !!}.educational_instituation_name_ar"
                            class="form-control" placeholder="{!! __('employees.enter_educational_instituation_name_ar') !!}"
                            @error('educationItems.' . $index . '.educational_instituation_name_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>


                        <input type="text"
                            wire:model="educationItems.{!! $index !!}.educational_instituation_name_en"
                            class="form-control mt-1" placeholder="{!! __('employees.enter_educational_instituation_name_en') !!}"
                            @error('educationItems.' . $index . '.educational_instituation_name_en')  style="border-color: rgb(246, 78, 96)"  @enderror>

                    </td>


                    <td class="col-lg-2 col-md-2 col-sm-12">
                        <input type="text"
                            wire:model="educationItems.{!! $index !!}.education_specialization_ar"
                            class="form-control" placeholder="{!! __('employees.enter_education_specialization_ar') !!}"
                            @error('educationItems.' . $index . '.education_specialization_ar')  style="border-color: rgb(246, 78, 96)"  @enderror />

                        <input type="text"
                            wire:model="educationItems.{!! $index !!}.education_specialization_en"
                            class="form-control mt-1" placeholder="{!! __('employees.enter_education_specialization_en') !!}"
                            @error('educationItems.' . $index . '.education_specialization_en')  style="border-color: rgb(246, 78, 96)"  @enderror />

                    </td>


                    <td class="col-lg-2 col-md-2 col-sm-12">
                        <input type="number" wire:model="educationItems.{!! $index !!}.education_year"
                            class="form-control" placeholder="{!! __('employees.enter_education_year') !!}"
                            @error('educationItems.' . $index . '.education_year')  style="border-color: rgb(246, 78, 96)"  @enderror />
                    </td>



                    <td class="col-lg-2 col-md-2 col-sm-12">
                        <select wire:model="educationItems.{!! $index !!}.education_level"
                            class="form-control"
                            @error('educationItems.' . $index . '.education_level')  style="border-color: rgb(246, 78, 96)"  @enderror>
                            <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                            <option value="phd">{!! __('employees.phd') !!}</option>
                            <option value="masters">{!! __('employees.masters') !!}</option>
                            <option value="university">{!! __('employees.university') !!}</option>
                            <option value="deplom">{!! __('employees.deplom') !!}</option>
                            <option value="preparatory">{!! __('employees.preparatory') !!}</option>
                            <option value="secondary">{!! __('employees.secondary') !!}</option>
                            <option value="etc">{!! __('employees.etc') !!}</option>

                        </select>
                    </td>

                    <td class="col-lg-3 col-md-3 col-sm-12">
                        <input type="file" wire:model="educationItems.{!! $index !!}.certification"
                            accept="image/*" class="form-control" />

                    </td>

                    <td>

                        @if ($row['certification'])
                            <div class="position-relative d-inline-block">
                                <img src="{!! $row['certification']->temporaryUrl() !!}" alt="{!! __('employees.photo') !!}"
                                    class="img-fluid img-thumbnail round-md" style="width: 70px  ; height: 70px" />
                            </div>
                        @endif
                    </td>

                    <td class="col-lg-1 col-md-1 col-sm-1">
                        <a href="javascript:void(0)" wire:click.prevent ="removeEducation({{ $index }})"
                            class="text-white  badge badge-danger">
                            <li class="la la-trash"></li>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>



</div>


<!-- begin: button -->
<div class="row {!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!}">
    <div class="col-md-12 ">
        <button type="button" wire:click="submitEducationForm" class="btn btn-primary btn-glow">
            {!! __('employees.save') !!}
            <span wire:loading wire:target="submitEducationForm">
                <i class="la la-refresh spinner">
                </i>
            </span>
        </button>
    </div>
</div>
<div class="clearfix"></div>
<!-- end: button -->
