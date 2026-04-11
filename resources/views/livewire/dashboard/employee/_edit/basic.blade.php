<form>
    <!-- begin: full name ar -->
    <div class="row mt-1">
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="first_name_ar">{!! __('employees.first_name_ar') !!}</label>
                <input type="text" wire:model.live="first_name_ar"
                    class="form-control premium-input @error('first_name_ar') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_first_name_ar') !!}">
                @error('first_name_ar')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="father_name_ar">{!! __('employees.father_name_ar') !!}</label>
                <input type="text" wire:model.live="father_name_ar"
                    class="form-control premium-input @error('father_name_ar') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_father_name_ar') !!}">
                @error('father_name_ar')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="grand_father_name_ar">{!! __('employees.grand_father_name_ar') !!}</label>
                <input type="text" wire:model.live="grand_father_name_ar"
                    class="form-control premium-input @error('grand_father_name_ar') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_grand_father_name_ar') !!}">
                @error('grand_father_name_ar')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="family_name_ar">{!! __('employees.family_name_ar') !!}</label>
                <input type="text" wire:model.live="family_name_ar"
                    class="form-control premium-input @error('family_name_ar') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_family_name_ar') !!}">
                @error('family_name_ar')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- begin: full name en -->
    <div class="row">
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="first_name_en">{!! __('employees.first_name_en') !!}</label>
                <input type="text" wire:model.live="first_name_en"
                    class="form-control premium-input @error('first_name_en') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_first_name_en') !!}">
                @error('first_name_en')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="father_name_en">{!! __('employees.father_name_en') !!}</label>
                <input type="text" wire:model.live="father_name_en"
                    class="form-control premium-input @error('father_name_en') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_father_name_en') !!}">
                @error('father_name_en')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="grand_father_name_en">{!! __('employees.grand_father_name_en') !!}</label>
                <input type="text" wire:model.live="grand_father_name_en"
                    class="form-control premium-input @error('grand_father_name_en') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_grand_father_name_en') !!}">
                @error('grand_father_name_en')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="family_name_en">{!! __('employees.family_name_en') !!}</label>
                <input type="text" wire:model.live="family_name_en"
                    class="form-control premium-input @error('family_name_en') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_family_name_en') !!}">
                @error('family_name_en')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Personal ID, Birthday, Gender, Password -->
    <div class="row">
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="personal_id">{!! __('employees.personal_id') !!}</label>
                <div class="premium-input-wrapper">
                    <i class="{{ $locked == 'open' ? 'icon-lock' : 'icon-lock-open' }}"
                        style="color: {{ $locked == 'open' ? '#ef4444' : '#6366f1' }}"
                        wire:click.prevent="{{ $locked == 'open' ? 'unlockPersonalID' : 'lockedPersonalID' }}"></i>
                    <input type="text" wire:model.live="personal_id"
                        class="form-control premium-input @error('personal_id') is-invalid-premium @enderror"
                        autocomplete="off" maxlength="9" {!! $personalIDReadOnly ? 'readonly' : '' !!}
                        placeholder="{!! __('employees.enter_personal_id') !!}">
                </div>
                @error('personal_id')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="birthday">{!! __('employees.birthday') !!}</label>
                <input type="date" wire:model.live="birthday"
                    class="form-control premium-input @error('birthday') is-invalid-premium @enderror">
                @error('birthday')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="gender">{!! __('employees.gender') !!}</label>
                <select wire:model.live="gender"
                    class="form-control premium-input @error('gender') is-invalid-premium @enderror">
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="male">{!! __('employees.male') !!}</option>
                    <option value="female">{!! __('employees.female') !!}</option>
                </select>
                @error('gender')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="password">{!! __('employees.password') !!}</label>
                <input type="password" wire:model.live="password"
                    class="form-control premium-input @error('password') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_password') !!}">
                @error('password')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="password_confirm">{!! __('employees.password_confirm') !!}</label>
                <input type="password" wire:model.live="password_confirm"
                    class="form-control premium-input @error('password_confirm') is-invalid-premium @enderror"
                    autocomplete="off" placeholder="{!! __('employees.enter_password_confirm') !!}">
                @error('password_confirm')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Contact Info -->
    <div class="row">
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="marital_status">{!! __('employees.marital_status') !!}</label>
                <select wire:model.live="marital_status"
                    class="form-control premium-input @error('marital_status') is-invalid-premium @enderror">
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="single">{!! __('employees.single') !!}</option>
                    <option value="married">{!! __('employees.married') !!}</option>
                    <option value="divorced">{!! __('employees.divorced') !!}</option>
                    <option value="widowed">{!! __('employees.widowed') !!}</option>
                </select>
                @error('marital_status')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="mobile_no">{!! __('employees.mobile_no') !!}</label>
                <input type="text" wire:model.live="mobile_no"
                    class="form-control premium-input @error('mobile_no') is-invalid-premium @enderror"
                    maxlength="10" placeholder="{!! __('employees.enter_mobile_no') !!}">
                @error('mobile_no')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="alternative_mobile_no">{!! __('employees.alternative_mobile_no') !!}</label>
                <input type="text" wire:model.live="alternative_mobile_no"
                    class="form-control premium-input @error('alternative_mobile_no') is-invalid-premium @enderror"
                    maxlength="10" placeholder="{!! __('employees.enter_alternative_mobile_no') !!}">
                @error('alternative_mobile_no')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="email">{!! __('employees.email') !!}</label>
                <input type="text" wire:model.live="email"
                    class="form-control premium-input @error('email') is-invalid-premium @enderror"
                    placeholder="{!! __('employees.enter_email') !!}">
                @error('email')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Location & Bank Information -->
    <div class="row">
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="governoate_id">{!! __('employees.governoate_id') !!}</label>
                <select id="governoate_id" name="governoate_id" wire:model="governoate_id"
                    wire:change="changeGovernorate($event.target.value)"
                    class="form-control premium-input @error('governoate_id') is-invalid-premium @enderror">
                    <option value="0" selected='selected'>{!! __('employees.select') !!} {!! __('employees.governoate_id') !!}
                    </option>
                    @foreach ($governorates as $key => $governorate)
                        <option value="{!! $governorate->id !!}">{!! $governorate->name !!}</option>
                    @endforeach
                </select>
                @error('governoate_id')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="city_id">{!! __('employees.city_id') !!}</label>
                <select id="city_id" name="city_id" wire:model="city_id"
                    class="form-control premium-input @error('city_id') is-invalid-premium @enderror">
                    <option value="0" selected='selected'>{!! __('general.select_from_list') !!}</option>
                    @foreach ($cities as $city)
                        <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                    @endforeach
                </select>
                @error('city_id')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="address_details_ar">{!! __('employees.address_details_ar') !!}</label>
                <input type="text" wire:model.live="address_details_ar"
                    class="form-control premium-input @error('address_details_ar') is-invalid-premium @enderror"
                    placeholder="{!! __('employees.enter_address_details_ar') !!}">
                @error('address_details_ar')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="address_details_en">{!! __('employees.address_details_en') !!}</label>
                <input type="text" wire:model.live="address_details_en"
                    class="form-control premium-input @error('address_details_en') is-invalid-premium @enderror"
                    placeholder="{!! __('employees.enter_address_details_en') !!}">
                @error('address_details_en')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Banking -->
    <div class="row">
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="bank_name">{!! __('employees.bank_name') !!}</label>
                <input type="text" wire:model.live="bank_name"
                    class="form-control premium-input @error('bank_name') is-invalid-premium @enderror"
                    placeholder="{!! __('employees.enter_bank_name') !!}">
                @error('bank_name')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="iban">{!! __('employees.iban') !!}</label>
                <input type="text" wire:model.live="iban"
                    class="form-control premium-input @error('iban') is-invalid-premium @enderror"
                    placeholder="{!! __('employees.enter_iban') !!}">
                @error('iban')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="banck_account">{!! __('employees.banck_account') !!}</label>
                <input type="text" wire:model.live="banck_account"
                    class="form-control premium-input @error('banck_account') is-invalid-premium @enderror"
                    placeholder="{!! __('employees.enter_banck_account') !!}">
                @error('banck_account')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="basic_salary">{!! __('employees.basic_salary') !!}</label>
                <input type="number" wire:model.live="basic_salary"
                    class="form-control premium-input @error('basic_salary') is-invalid-premium @enderror"
                    placeholder="{!! __('employees.enter_basic_salary') !!}">
                @error('basic_salary')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="currency">{!! __('employees.currency') !!}</label>
                <select wire:model.live="currency"
                    class="form-control premium-input @error('currency') is-invalid-premium @enderror">
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="ILS">{!! __('employees.ILS') !!}</option>
                    <option value="USD">{!! __('employees.USD') !!}</option>
                    <option value="GBP">{!! __('employees.GBP') !!}</option>
                </select>
                @error('currency')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Photos -->
    <div class="row">
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="new_photo">{!! __('employees.photo') !!}
                    @if ($new_photo)
                        <i class="la la-check-circle text-success ml-1"></i>
                    @endif
                </label>
                <div class="premium-photo-container">
                    <input type="file" class="form-control-file" wire:model.live="new_photo" accept="image/*">
                    <div wire:loading wire:target="new_photo" class="small text-primary mt-1">
                        <i class="la la-spinner la-spin"></i> {!! __('employees.uploading') !!}
                    </div>
                </div>
                @error('new_photo')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 d-flex align-items-center gap-3">
            @if ($photo && !$new_photo)
                <div class="text-center mr-3">
                    <small class="d-block mb-1 text-muted">{!! __('employees.photo') !!}</small>
                    <img src="{!! asset('uploads/employeesPhotos/' . $photo) !!}" class="premium-photo-preview shadow-sm"
                        style="width: 85px; height: 85px;" />
                </div>
            @endif

            @if ($new_photo)
                <div class="text-center">
                    <small class="d-block mb-1 text-primary">{!! __('employees.new_photo') !!}</small>
                    <img src="{!! $new_photo->temporaryUrl() !!}" class="premium-photo-preview shadow border-primary"
                        style="width: 85px; height: 85px;" />
                </div>
            @endif
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row mt-3">
        <div class="col-md-12 text-right">
            <button type="button" wire:click="submitBasicFrom" class="btn btn-premium-add px-4">
                <i class="la la-save mr-1"></i>
                {!! __('employees.save') !!}
                <span wire:loading wire:target="submitBasicFrom">
                    <i class="la la-refresh la-spin ml-1"></i>
                </span>
            </button>
        </div>
    </div>
</form>
