<div class="badge badge-md {!! $ticket->status == 1 ? 'badge-success' : 'badge-danger' !!} ticket_status_{!! $ticket->id !!}">
    {!! $ticket->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
