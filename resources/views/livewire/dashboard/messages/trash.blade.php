<div class="h-100">
    <div class="msg-main-card border-0 shadow-sm h-100">
        <div class="msg-card-header-premium d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-dark font-weight-bold mb-0">
                    <i class="ft-trash-2 mr-2 text-danger"></i>
                    {!! __('messages.trash') !!}
                </h4>
            </div>
            <div class="d-flex align-items-center">
                <div class="msg-count-badge">{{ $messages->total() }} {!! __('messages.messages') !!}</div>
            </div>
        </div>

        <div class="card-body p-0 flex-grow-1 overflow-auto">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr class="bg-light">
                            <th class="border-0 px-3 col-w-200">{!! __('messages.user') !!}</th>
                            <th class="border-0">{!! __('messages.subject') !!}</th>
                            <th class="border-0 text-center col-w-150">{!! __('messages.date') !!}</th>
                            <th class="border-0 text-right px-3 col-w-120">{!! __('messages.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                            <tr wire:key="msg-{{ $message->id }}">
                                <td class="px-3 text-truncate col-max-200">
                                    @php
                                        $admin = auth()->guard('admin')->user();
                                        $isSent =
                                            $message->sender_id == $admin->id && $message->sender_type == get_class($admin);
                                    @endphp
                                    <span class="text-dark font-weight-bold">
                                        @if ($isSent)
                                            <span class="text-muted small mr-1">{!! __('messages.to') !!}:</span>
                                            {{ $message->receiver->name ?? 'Unknown' }}
                                        @else
                                            <span class="text-muted small mr-1">{!! __('messages.from') !!}:</span>
                                            {{ $message->sender->name ?? 'Unknown' }}
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" wire:click.prevent="showMessage({{ $message->id }})"
                                        class="text-decoration-none d-block text-truncate">
                                        <span class="text-primary">{{ $message->subject }}</span>
                                        <span class="text-muted font-weight-normal small ml-2 d-none d-md-inline">
                                            - {{ Str::limit(strip_tags($message->body), 80) }}
                                        </span>
                                    </a>
                                </td>
                                <td class="small text-muted text-center">
                                    {{ $message->created_at->diffForHumans() }}
                                </td>
                                <td class="text-right px-3">
                                    <button wire:click="restore({{ $message->id }})"
                                        class="btn btn-sm btn-outline-success border-0" title="{!! __('messages.restore') !!}">
                                        <i class="ft-rotate-ccw"></i>
                                    </button>
                                    <button wire:click="confirmPermanentDelete({{ $message->id }})"
                                        class="btn btn-sm btn-outline-danger border-0" title="{!! __('messages.delete_forever') !!}">
                                        <i class="ft-x-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="py-5">
                                        <i class="ft-trash-2 text-muted opacity-25 empty-state-icon-lg"></i>
                                        <p class="mt-4 text-muted font-weight-bold h5">{!! __('messages.no_trash_messages') !!}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($messages->total() > $messages->perPage())
                <div class="pagination-container p-3">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Message Details Modal (Redesigned & Premium) -->
    <div class="modal modal-pop fade" id="messageDetailsModal" tabindex="-1" role="dialog"
        aria-labelledby="messageDetailsModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content overflow-hidden border-0 shadow-lg">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="messageDetailsModalLabel">
                        <i class="ft-mail mr-2 text-primary"></i> {!! __('messages.messages_details') !!}
                    </h5>
                    <button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    @if ($selectedMessage)
                        @php
                            $admin = auth()->guard('admin')->user();
                            $isSent =
                                $selectedMessage->sender_id == $admin->id &&
                                $selectedMessage->sender_type == get_class($admin);
                            $displayUser = $isSent ? $selectedMessage->receiver : $selectedMessage->sender;
                        @endphp
                        <div class="message-meta-box d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded-circle p-2 mr-3 d-flex align-items-center justify-content-center shadow-sm avatar-icon-box-md">
                                    <i class="ft-user text-primary font-medium-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">
                                        {{ $isSent ? __('messages.to') : __('messages.from') }}:
                                        {{ $displayUser->name ?? 'Unknown' }}
                                    </h6>
                                    <small
                                        class="text-muted font-weight-bold">{{ $displayUser->email ?? '' }}</small>
                                </div>
                            </div>
                            <div class="text-right d-none d-sm-block">
                                <small
                                    class="text-muted d-block font-weight-bold">{{ $selectedMessage->created_at->format('M d, Y') }}</small>
                                <small
                                    class="text-primary font-weight-bold">{{ $selectedMessage->created_at->format('h:i A') }}</small>
                                <small
                                    class="text-muted d-block small">({{ $selectedMessage->created_at->diffForHumans() }})</small>
                            </div>
                        </div>

                        <div class="mb-2">
                            <h4 class="font-weight-bold text-dark mb-4">{{ $selectedMessage->subject }}</h4>
                            <div class="message-body-content shadow-sm">
                                {!! nl2br(e($selectedMessage->body)) !!}
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">{!! __('general.loading') !!}</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer border-0 p-3 bg-light-subtle">
                    <button type="button" class="btn btn-outline-secondary px-4 font-weight-bold"
                        data-dismiss="modal">{!! __('general.close') !!}</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', function() {
            Livewire.on('open-message-modal', function() {
                $('#messageDetailsModal').modal('show');
            });
        });
    </script>
@endpush




