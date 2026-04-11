<div class="custom-control custom-switch custom-control-primary premium-switch">
    <input type="checkbox" class="custom-control-input change_status" id="status_{!! $status->id !!}" data-id="{!! $status->id !!}"
        {!! $status->status == 1 ? 'checked' : '' !!}>
    <label class="custom-control-label" for="status_{!! $status->id !!}"></label>
</div>
