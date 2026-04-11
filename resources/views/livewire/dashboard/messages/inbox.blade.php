<div class="h-100">
    <div class="msg-main-card border-0 shadow-sm h-100">
        <div class="msg-card-header-premium d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-dark font-weight-bold mb-0">
                    <i class="ft-inbox mr-2 text-primary"></i>
                    {!! __('messages.inbox') !!}
                </h4>
            </div>
            <div class="d-flex align-items-center">
                @if (count($selectedMessages) > 0)
                    <button wire:click="confirmBulkDelete" class="btn btn-danger btn-sm mr-3 text-white">
                        <i class="ft-trash-2 mr-1"></i>{!! __('messages.delete_selected') !!} ({{ count($selectedMessages) }})
                    </button>
                @endif
                <div class="msg-count-badge">{{ $messages->total() }} {!! __('messages.messages') !!}</div>
            </div>
        </div>

        <div class="card-body p-0 flex-grow-1 overflow-auto">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr class="bg-light">
                            <th class="border-0 px-3 col-w-45">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" wire:model.live="selectAll" class="custom-control-input"
                                        id="selectAll">
                                    <label class="custom-control-label" for="selectAll"></label>
                                </div>
                            </th>
                            <th class="border-0 text-center col-w-45"><i class="ft-star text-muted"></i></th>
                            <th class="border-0 col-w-200">{!! __('messages.sender') !!}</th>
                            <th class="border-0">{!! __('messages.subject') !!}</th>
                            <th class="border-0 text-center col-w-150">{!! __('messages.date') !!}</th>
                            <th class="border-0 text-right px-3 col-w-80">{!! __('messages.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                            <tr wire:key="msg-{{ $message->id }}" class="{{ !$message->is_read ? 'bg-primary-subtle' : '' }}">
                                <td class="px-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" wire:model.live="selectedMessages"
                                            value="{{ $message->id }}" class="custom-control-input"
                                            id="msg-{{ $message->id }}">
                                        <label class="custom-control-label" for="msg-{{ $message->id }}"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span wire:click="toggleStar({{ $message->id }})"
                                        class="msg-star {{ $message->is_starred ? 'starred' : '' }}">
                                        <i class="{{ $message->is_starred ? 'fas' : 'far' }} fa-star"></i>
                                    </span>
                                </td>
                                <td class="text-truncate col-max-200">
                                    <span class="{{ !$message->is_read ? 'font-weight-bold text-dark' : 'text-muted' }}">
                                        {{ $message->sender->name ?? 'Unknown' }}
                                    </span>
                                    @if (!$message->is_read)
                                        <span class="msg-badge-new ml-1">{!! __('messages.new') !!}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="javascript:void(0)" wire:click.prevent="showMessage({{ $message->id }})"
                                        class="text-decoration-none d-block text-truncate">
                                        <span
                                            class="{{ !$message->is_read ? 'font-weight-bold text-dark' : 'text-primary' }}">{{ $message->subject }}</span>
                                        <span class="text-muted font-weight-normal small ml-2 d-none d-md-inline">
                                            - {{ Str::limit(strip_tags($message->body), 80) }}
                                        </span>
                                    </a>
                                </td>
                                <td class="small text-muted text-center">
                                    {{ $message->created_at->diffForHumans() }}
                                </td>
                                <td class="text-right px-3">
                                    <button wire:click="confirmDelete({{ $message->id }})"
                                        class="btn btn-sm btn-outline-danger border-0" title="{!! __('messages.move_to_trash') !!}">
                                        <i class="ft-trash-2"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="py-5">
                                        <i class="ft-inbox text-muted opacity-25 empty-state-icon-lg"></i>
                                        <p class="mt-4 text-muted font-weight-bold h5">{!! __('messages.your_inbox_is_empty') !!}</p>
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
                        <div class="message-meta-box d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded-circle p-2 mr-3 d-flex align-items-center justify-content-center shadow-sm avatar-icon-box-md">
                                    <i class="ft-user text-primary font-medium-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">
                                        {{ $selectedMessage->sender->name ?? 'Unknown' }}
                                    </h6>
                                    <small
                                        class="text-muted font-weight-bold">{{ $selectedMessage->sender->email ?? '' }}</small>
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
                    <button type="button" class="btn btn-primary text-white px-4 font-weight-bold shadow-sm"
                        wire:click="reply">
                        <i class="la la-reply mr-2"></i>{!! __('general.replay') !!}
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

            Livewire.on('close-details-modal', function() {
                $('#messageDetailsModal').modal('hide');
            });

            Livewire.on('open-compose-modal', function() {
                $('#composeModal').modal('show');
            });
        });
    </script>
@endpush




