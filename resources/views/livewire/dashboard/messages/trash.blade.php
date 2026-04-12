<div class="h-100">
    <div class="msg-main-card border-0 shadow-sm h-100">
        <div class="msg-card-header-premium d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-dark font-weight-bold mb-0">
                    <i class="la la-trash mr-2 text-danger"></i>
                    {!! __('messages.trash') !!}
                </h4>
            </div>
            <div class="d-flex align-items-center">
                @if (count($selectedMessages) > 0)
                    <div class="btn-group mr-3 shadow-sm rounded-pill overflow-hidden">
                        <button wire:click="confirmBulkRestore" class="btn btn-success btn-sm mr-2 text-white shadow-pulse rounded-pill px-3">
                        <i class="la la-refresh mr-1"></i>{!! __('messages.restore_selected') !!} ({{ count($selectedMessages) }})
                    </button>
                    <button wire:click="confirmBulkDelete" class="btn btn-danger btn-sm text-white shadow-pulse rounded-pill px-3">
                        <i class="la la-trash mr-1"></i>{!! __('messages.delete_selected_permanently') !!} ({{ count($selectedMessages) }})
                    </button>
                    </div>
                @endif
                <div class="msg-count-badge shadow-xs">{{ $messages->total() }} {!! __('messages.messages') !!}</div>
            </div>
        </div>

        <div class="card-body p-0 flex-grow-1 overflow-auto">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="px-3 col-w-45">
                                <div class="custom-control custom-checkbox custom-control-indigo">
                                    <input type="checkbox" wire:model.live="selectAll" class="custom-control-input"
                                        id="selectAll">
                                    <label class="custom-control-label" for="selectAll"></label>
                                </div>
                            </th>
                            <th class="col-w-200">{!! __('messages.sender') !!}</th>
                            <th>{!! __('messages.subject') !!}</th>
                            <th class="text-center col-w-150">{!! __('messages.date') !!}</th>
                            <th class="text-right px-3 col-w-150">{!! __('messages.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                            <tr wire:key="msg-{{ $message->id }}">
                                <td class="px-3">
                                    <div class="custom-control custom-checkbox custom-control-indigo">
                                        <input type="checkbox" wire:model.live="selectedMessages"
                                            value="{{ $message->id }}" class="custom-control-input"
                                            id="msg-{{ $message->id }}">
                                        <label class="custom-control-label" for="msg-{{ $message->id }}"></label>
                                    </div>
                                </td>
                                <td class="text-truncate col-max-200">
                                    <span class="font-weight-black text-dark">
                                        {{ $message->sender->name ?? 'Unknown' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" wire:click.prevent="showMessage({{ $message->id }})"
                                        class="text-decoration-none d-block text-truncate">
                                        <span class="text-indigo font-weight-600">{{ $message->subject }}</span>
                                        <span class="text-muted font-weight-normal small ml-2 d-none d-md-inline">
                                            - {{ Str::limit(strip_tags($message->body), 80) }}
                                        </span>
                                    </a>
                                </td>
                                <td class="small text-muted text-center font-weight-600">
                                    {{ $message->created_at->diffForHumans() }}
                                </td>
                                <td class="text-right px-3 text-nowrap">
                                    <button wire:click="restore({{ $message->id }})"
                                        class="btn-premium-action btn-premium-action-success shadow-none mr-1"
                                        title="{!! __('messages.restore') !!}">
                                        <i class="la la-refresh"></i>
                                    </button>
                                    <button wire:click="confirmPermanentDelete({{ $message->id }})"
                                        class="btn-premium-action btn-premium-action-danger shadow-none" title="{!! __('messages.delete_forever') !!}">
                                        <i class="la la-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="py-5">
                                        <i class="la la-trash text-muted opacity-25" style="font-size: 5rem;"></i>
                                        <p class="mt-4 text-muted font-weight-bold h5">{!! __('messages.your_trash_is_empty') !!}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($messages->total() > $messages->perPage())
                <div class="pagination-container p-3 border-top bg-light/30">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Message Details Modal (Redesigned & Premium) -->
    <div class="modal modal-pop fade" id="messageDetailsModal" tabindex="-1" role="dialog"
        aria-labelledby="messageDetailsModalLabel" aria-true="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 20px;">
                <div class="modal-header d-flex align-items-center bg-white border-bottom">
                    <h5 class="modal-title font-weight-bold" id="messageDetailsModalLabel">
                        <i class="la la-envelope-open mr-2 text-primary"></i> {!! __('messages.messages_details') !!}
                    </h5>
                    <button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="font-large-1">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4 bg-white">
                    @if ($selectedMessage)
                        @php
                            $admin = auth()->guard('admin')->user();
                            $isSent =
                                $selectedMessage->sender_id == $admin->id &&
                                $selectedMessage->sender_type == get_class($admin);
                            $displayUser = $isSent ? $selectedMessage->recipient : $selectedMessage->sender;
                        @endphp
                        <div class="message-meta-box d-flex justify-content-between align-items-center mb-4 p-3 bg-light/50 rounded-xl">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded-circle p-2 mr-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                                    <i class="la la-user text-primary font-large-1"></i>
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

                        <div class="px-2">
                            <h4 class="font-weight-black text-dark mb-4">{{ $selectedMessage->subject }}</h4>
                            <div class="message-body-content p-4 rounded-xl bg-light/20 border" style="min-height: 200px; line-height: 1.6; font-size: 1.1rem; color: #334155;">
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
                <div class="modal-footer border-0 p-3 bg-light/30 d-flex justify-content-end">
                    <button type="button" class="btn btn-light-dark px-4 py-1 rounded-pill font-weight-black transition-all-300 shadow-none border-0"
                        data-dismiss="modal" style="font-size: 0.9rem;">
                        <i class="la la-times mr-2"></i> {!! __('general.close') !!}
                    </button>
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




