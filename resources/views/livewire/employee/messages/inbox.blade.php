<div class="h-100">
    <div class="msg-main-card border-0">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-center msg-card-header-premium">
                <div>
                    <h4 class="text-dark fw-bold mb-0">
                        <i class="mdi mdi-inbox-outline me-2 text-primary" style="font-size: 1.5rem"></i>
                        {!! __('messages.inbox') !!}
                    </h4>
                </div>
                <div class="msg-count-badge">{{ $messages->total() }} {!! __('messages.messages') !!}</div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 40px;" class="border-0 px-3"><i class="mdi mdi-star-outline text-muted"></i></th>
                            <th style="width: 200px;" class="border-0">{!! __('messages.sender') !!}</th>
                            <th class="border-0">{!! __('messages.subject') !!}</th>
                            <th style="width: 150px;" class="border-0">{!! __('messages.date') !!}</th>
                            <th style="width: 100px;" class="border-0 text-end px-3">{!! __('messages.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                            <tr wire:key="msg-{{ $message->id }}"
                                class="{{ !$message->is_read ? 'bg-primary-subtle fw-bold' : '' }}">
                                <td class="px-3">
                                    <span wire:click="toggleStar({{ $message->id }})"
                                        class="msg-star {{ $message->is_starred ? 'starred' : '' }}">
                                        <i
                                            class="mdi {{ $message->is_starred ? 'mdi-star' : 'mdi-star-outline' }}"></i>
                                    </span>
                                </td>
                                <td class="text-truncate" style="max-width: 200px;">
                                    {{ $message->sender->name ?? 'Unknown' }}
                                    @if (!$message->is_read)
                                        <span class="msg-badge-new ms-1">{!! __('messages.new') !!}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="javascript:void(0)" wire:click.prevent="showMessage({{ $message->id }})"
                                        class="text-decoration-none d-block text-truncate text-dark"
                                        style="max-width: 500px;">
                                        <span class="{{ !$message->is_read ? 'fw-bold' : 'text-primary' }}">{{ $message->subject }}</span>
                                        <span class="text-muted fw-normal small ms-2 d-none d-md-inline">
                                            - {{ Str::limit(strip_tags($message->body), 80) }}
                                        </span>
                                    </a>
                                </td>
                                <td class="small text-muted">
                                    {{ $message->created_at->diffForHumans() }}
                                </td>
                                <td class="text-end px-3">
                                    <button wire:click="confirmDelete({{ $message->id }})"
                                        class="btn btn-inverse-danger btn-icon" title="{!! __('messages.move_to_trash') !!}">
                                        <i class="mdi mdi-delete-outline"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="py-5">
                                        <i class="mdi mdi-inbox text-muted opacity-50" style="font-size: 10rem;"></i>
                                        <p class="mt-4 text-muted fw-bold fs-4">{!! __('messages.your_inbox_is_empty') !!}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($messages->total() > $messages->perPage())
                <div class="pagination-container mt-4">
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
                        <i class="mdi mdi-email-open-outline me-2 text-primary"></i> {!! __('messages.messages_details') !!}
                    </h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    @if ($selectedMessage)
                        <div class="message-meta-box d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-subtle rounded-circle p-2 me-3 d-flex align-items-center justify-content-center shadow-sm"
                                    style="width: 50px; height: 50px;">
                                    <i class="mdi mdi-account-circle text-primary fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark fs-6">
                                        {{ $selectedMessage->sender->name ?? 'Unknown' }}
                                    </h6>
                                    <small class="text-muted fw-semibold">{{ $selectedMessage->sender->email ?? '' }}</small>
                                </div>
                            </div>
                            <div class="text-end d-none d-sm-block">
                                <small class="text-muted d-block fw-bold fs-6">{{ $selectedMessage->created_at->format('M d, Y') }}</small>
                                <small class="text-primary fw-bold">{{ $selectedMessage->created_at->format('h:i A') }}</small>
                                <small class="text-muted d-block small">({{ $selectedMessage->created_at->diffForHumans() }})</small>
                            </div>
                        </div>

                        <div class="mb-2 p-1">
                            <h4 class="fw-bold text-dark mb-4 px-1">{{ $selectedMessage->subject }}</h4>
                            <div class="message-body-content shadow-sm">
                                {!! nl2br(e($selectedMessage->body)) !!}
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">{!! __('general.loading') !!}</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer border-0 p-3 bg-light-subtle">
                    <button type="button" class="btn btn-outline-secondary px-4 fw-bold"
                        data-bs-dismiss="modal">{!! __('general.close') !!}</button>
                    <button type="button" class="btn btn-primary text-white px-4 fw-bold shadow-sm" wire:click="reply">
                        <i class="mdi mdi-reply me-2"></i>{!! __('general.replay') !!}
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
                var modalElement = document.getElementById('messageDetailsModal');
                var modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modal.show();
            });

            Livewire.on('close-details-modal', function() {
                var modalElement = document.getElementById('messageDetailsModal');
                var modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modal.hide();
            });

            Livewire.on('open-compose-modal', function() {
                var modalElement = document.getElementById('composeModal');
                var modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modal.show();
            });
        });
    </script>
@endpush
