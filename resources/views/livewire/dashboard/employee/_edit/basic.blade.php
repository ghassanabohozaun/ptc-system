<form>

    <!-- begin: full name  ar-->
    <div class="row mt-1">
        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="first_name_ar">{!! __('employees.first_name_ar') !!}</label>
                <input type="text" wire:model.live="first_name_ar" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_first_name_ar') !!}"
                    @error('first_name_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('first_name_ar')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="father_name_ar">{!! __('employees.father_name_ar') !!}</label>
                <input type="text" wire:model.live="father_name_ar" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_father_name_ar') !!}"
                    @error('father_name_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('father_name_ar')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->



        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="grand_father_name_ar">{!! __('employees.grand_father_name_ar') !!}</label>
                <input type="text" wire:model.live="grand_father_name_ar" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_grand_father_name_ar') !!}"
                    @error('grand_father_name_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('grand_father_name_ar')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="family_name_ar">{!! __('employees.family_name_ar') !!}</label>
                <input type="text" wire:model.live='family_name_ar' class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_family_name_ar') !!}"
                    @error('family_name_ar')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('family_name_ar')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->
    </div>
    <!-- end: full name ar -->


    <!-- begin: full name en-->
    <div class="row">
        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="first_name_en">{!! __('employees.first_name_en') !!}</label>
                <input type="text" wire:model.live="first_name_en" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_first_name_en') !!}"
                    @error('first_name_en')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('first_name_en')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="father_name_en">{!! __('employees.father_name_en') !!}</label>
                <input type="text" wire:model.live="father_name_en" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_father_name_en') !!}"
                    @error('father_name_en')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('father_name_en')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="grand_father_name_en">{!! __('employees.grand_father_name_en') !!}</label>
                <input type="text" wire:model.live="grand_father_name_en" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_grand_father_name_en') !!}"
                    @error('grand_father_name_en')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('grand_father_name_en')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="family_name_en">{!! __('employees.family_name_en') !!}</label>
                <input type="text" wire:model.live='family_name_en' class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_family_name_en') !!}"
                    @error('family_name_en')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('family_name_en')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->
    </div>
    <!-- end: full name en -->


    <!-- end: personal_id , birthday , gender ,password,password_confirm -->
    <div class="row">
        <!-- begin: input -->

        <div class="col-md-3">
            <div class="form-group">
                <label for="personal_id">{!! __('employees.personal_id') !!}</label>
                <div class="input-group">
                    @if ($locked == 'open')
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="color: black;font-size: 15px;cursor: pointer;"
                                wire:click.prevent="unlockPersonalID()">
                                <i class="icon-lock"></i>
                            </span>
                        </div>
                    @elseif($locked == 'close')
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="color:black;font-size: 15px;cursor: pointer;"
                                wire:click.prevent="lockedPersonalID()">
                                <i class="icon-lock-open"></i>
                            </span>
                        </div>
                    @endif
                    <input type="text" wire:model.live="personal_id" class="form-control" autocomplete="off"
                        {!! $personalIDReadOnly ? 'readonly' : '' !!} placeholder="{!! __('employees.enter_personal_id') !!}" aria-describedby="basic-addon3"
                        @error('personal_id')  style="border-color: rgb(246, 78, 96)"  @enderror>
                </div>
                @error('personal_id')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- end: input -->



        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="birthday">{!! __('employees.birthday') !!}</label>
                <input type="date" wire:model.live="birthday" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_birthday') !!}"
                    @error('birthday')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('birthday')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->



        <!-- begin: input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="gender">{!! __('employees.gender') !!}</label>
                <select wire:model.live="gender" class="form-control"
                    @error('gender')  style="border-color: rgb(246, 78, 96)"  @enderror>
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="male">{!! __('employees.male') !!}</option>
                    <option value="female">{!! __('employees.female') !!}</option>
                </select>
                @error('gender')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="password">{!! __('employees.password') !!}</label>
                <input type="password" wire:model.live="password" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_password') !!}"
                    @error('password')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('password')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input --> <!-- begin: input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="password_confirm">{!! __('employees.password_confirm') !!}</label>
                <input type="password" wire:model.live="password_confirm" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_password_confirm') !!}"
                    @error('password_confirm')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('password_confirm')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->




    </div>
    <!-- end: personal_id , birthday , gender ,password,password_confirm -->


    <!-- end: marital_status ,mobile_no,alternative_mobile_no ,email -->
    <div class="row">

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="marital_status">{!! __('employees.marital_status') !!}</label>
                <select wire:model.live="marital_status" class="form-control"
                    @error('marital_status')  style="border-color: rgb(246, 78, 96)"  @enderror>
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="single">{!! __('employees.single') !!}</option>
                    <option value="married">{!! __('employees.married') !!}</option>
                    <option value="divorced">{!! __('employees.divorced') !!}</option>
                    <option value="widowed">{!! __('employees.widowed') !!}</option>
                </select>
                @error('marital_status')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="mobile_no">{!! __('employees.mobile_no') !!}</label>
                <input type="text" wire:model.live="mobile_no" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_mobile_no') !!}"
                    @error('mobile_no')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('mobile_no')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->



        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="alternative_mobile_no">{!! __('employees.alternative_mobile_no') !!}</label>
                <input type="text" wire:model.live="alternative_mobile_no" class="form-control"
                    autocomplete="off" placeholder="{!! __('employees.enter_alternative_mobile_no') !!}"
                    @error('alternative_mobile_no')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('alternative_mobile_no')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="email">{!! __('employees.email') !!}</label>
                <input type="text" wire:model.live="email" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_email') !!}"
                    @error('email')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('email')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->





    </div>
    <!-- end: marital_status ,mobile_no,alternative_mobile_no ,email  -->


    <!-- begin: governoate_id , city_id , address_details-->
    <div class="row">

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="governoate_id">{!! __('employees.governoate_id') !!}</label>
                <select type="text" wire:model="governoate_id"
                    wire:change="changeGovernorate($event.target.value)" id="governoate_id" name="governoate_id"
                    class="form-control" @error('governoate_id')  style="border-color: rgb(246, 78, 96)"  @enderror>
                    <option value="0" selected='selected'>
                        {!! __('employees.select') !!} {!! __('employees.governoate_id') !!}
                    </option>
                    @foreach ($governorates as $key => $governorate)
                        <option value="{!! $governorate->id !!}">{!! $governorate->name !!}</option>
                    @endforeach
                </select>
                @error('governoate_id')
                    <span class="text text-danger">
                        <strong class="strong-weight">{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="city_id">{!! __('employees.city_id') !!}</label>
                <select class="form-control custom_select" wire:model="city_id" id="city_id" name="city_id"
                    @error('city_id')  style="border-color: rgb(246, 78, 96)"  @enderror>
                    <option value="0" selected='selected'>
                        {!! __('general.select_from_list') !!}
                    </option>
                    @foreach ($cities as $city)
                        <option value="{!! $city->id !!}">
                            {!! $city->name !!}
                        </option>
                    @endforeach
                </select>
                @error('city_id')
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
                <label for="address_details">{!! __('employees.address_details') !!}</label>
                <input type="text" wire:model.live="address_details" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_address_details') !!}"
                    @error('address_details')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('address_details')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


    </div>
    <!-- end: governoate_id , city_id , address_details -->


    <!-- end: bank_name  ,iban ,banck_account -->
    <div class="row">

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="bank_name">{!! __('employees.bank_name') !!}</label>
                <input type="text" wire:model.live="bank_name" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_bank_name') !!}"
                    @error('bank_name')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('bank_name')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="iban">{!! __('employees.iban') !!}</label>
                <input type="text" wire:model.live="iban" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_iban') !!}"
                    @error('iban')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('iban')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="banck_account">{!! __('employees.banck_account') !!}</label>
                <input type="text" wire:model.live="banck_account" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_banck_account') !!}"
                    @error('banck_account')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('banck_account')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="basic_salary">{!! __('employees.basic_salary') !!}</label>
                <input type="number" wire:model.live="basic_salary" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_basic_salary') !!}"
                    @error('basic_salary')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('basic_salary')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-2">
            <div class="form-group">
                <label for="currency">{!! __('employees.currency') !!}</label>
                <select wire:model.live="currency" class="form-control"
                    @error('currency')  style="border-color: rgb(246, 78, 96)"  @enderror>
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="ILS">{!! __('employees.ILS') !!}</option>
                    <option value="USD">{!! __('employees.USD') !!}</option>
                    <option value="GBP">{!! __('employees.GBP') !!}</option>
                </select>
                @error('currency')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

    </div>
    <!-- end: employee_status_id , bank_name  ,iban ,banck_account  -->

    <!-- begin:  photo  -->
    <div class="row">
        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="photo">{!! __('employees.photo') !!}

                </label>
                <input type="file" class="form-control" wire:model.live="new_photo" accept="image/*"
                    @error('new_photo')  style="border-color: rgb(246, 78, 96)"  @enderror>

                <div wire:loading wire:target="new_photo">{!! __('employees.uploading') !!}</div>

                @error('new_photo')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->



        <!-- begin: input -->
        <div class="col-md-3">
            {{-- old --}}
            @if ($photo && !$new_photo)
                <div class="position-relative d-inline-block mt-1 mb-2">
                    <img src="{!! asset('uploads/employeesPhotos/' . $photo) !!}" alt="{!! __('employees.photo') !!}"
                        class="img-fluid img-thumbnail round-md"
                        style="width: 70px  ; height: 70px; border-radius: 50%;" />
                </div>
            @endif


            {{-- new --}}
            @if ($new_photo)
                <div class="position-relative d-inline-block mt-1 mb-2">
                    <img src="{!! $new_photo->temporaryUrl() !!}" alt="{!! __('employees.photo') !!}"
                        class="img-fluid img-thumbnail round-md"
                        style="width: 70px  ; height: 70px; border-radius: 50%;" />
                </div>
            @endif
        </div>
        <!-- end: input -->


    </div>
    <!-- end:  photo  -->

    <!-- begin: button -->
    <div class="row {!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!} mt-3">
        <div class="col-md-12">
            <button type="button" wire:click ="submitBasicFrom" class="btn btn-primary  btn-glow">
                {!! __('employees.save') !!}
                <span wire:loading wire:target="submitBasicFrom">
                    <i class="la la-refresh spinner">
                    </i>
                </span>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- end: button -->
</form>
