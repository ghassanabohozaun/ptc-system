<div class="premium-switch-centered-wrapper">
    <div class="custom-control custom-switch custom-control-primary premium-switch-centered">
        <input type="checkbox" class="custom-control-input change_status" id="customSwitch_{{ $admin->id }}" {{ $admin->status == 1 ? 'checked' : '' }} data-id="{{ $admin->id }}" />
        <label class="custom-control-label" for="customSwitch_{{ $admin->id }}"></label>
    </div>
</div>
