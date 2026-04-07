<div class="custom-control custom-checkbox custom-control-primary">
    <input type="checkbox" class="custom-control-input change_status" id="status_check_{{ $salary->id }}"
        {{ $salary->status == 1 ? 'checked' : '' }} data-id="{{ $salary->id }}">
    <label class="custom-control-label" for="status_check_{{ $salary->id }}"></label>
</div>
