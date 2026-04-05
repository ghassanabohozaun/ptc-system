<div>
    <div class="card card-rounded">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start mb-4">
                <div>
                    <h4 class="card-title card-title-dash">
                        <i class="mdi mdi-inbox me-2 text-primary" style="font-size: 18px"></i>
                        {!! __('messages.inbox') !!}
                    </h4>
                </div>
                <div class="text-muted small">{{ $messages->total() }} {!! __('messages.messages') !!}</div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 40px;"><i class="mdi mdi-star-outline text-muted"></i></th>
                            <th style="width: 200px;">{!! __('messages.sender') !!}</th>
                            <th>{!! __('messages.subject') !!}</th>
                            <th style="width: 150px;">{!! __('messages.date') !!}</th>
                            <th style="width: 80px;" class="text-end">{!! __('messages.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                            <tr wire:key="msg-{{ $message->id }}"
                                class="{{ !$message->is_read ? 'table-light fw-bold' : '' }}">
                                <td>
                                    <span wire:click="toggleStar({{ $message->id }})"
                                        class="msg-star {{ $message->is_starred ? 'starred' : '' }}"
                                        style="cursor: pointer;">
                                        <i
                                            class="mdi {{ $message->is_starred ? 'mdi-star text-warning' : 'mdi-star-outline text-muted' }}"></i>
                                    </span>
                                </td>
                                <td class="text-truncate" style="max-width: 200px;">
                                    {{ $message->sender->name ?? 'Unknown' }}
                                    @if (!$message->is_read)
                                        <span class="badge badge-primary rounded-pill ms-1"
                                            style="font-size: 10px;">{!! __('messages.new') !!}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="javascript:void(0)" wire:click.prevent="showMessage({{ $message->id }})"
                                        class="text-decoration-none d-block text-truncate"
                                        style="color: {{ !$message->is_read ? '#212529' : '#495057' }}; max-width: 500px;">
                                        <span>{{ $message->subject }}</span>
                                        <span class="text-muted fw-normal small ms-1">
                                            - {{ Str::limit(strip_tags($message->body), 60) }}
                                        </span>
                                    </a>
                                </td>
                                <td class="small text-muted">
                                    {{ $message->created_at->diffForHumans() }}
                                </td>
                                <td class="text-end">
                                    <button wire:click="confirmDelete({{ $message->id }})"
                                        class="btn btn-outline-danger btn-fw text-dark" title="{!! __('messages.move_to_trash') !!}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="mdi mdi-inbox fa-3x mb-3 opacity-25"></i>
                                    <p class="mb-0">{!! __('messages.your_inbox_is_empty') !!}</p>
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

    <!-- Message Details Modal -->
    <div class="modal modal-pop fade" id="messageDetailsModal" tabindex="-1" role="dialog"
        aria-labelledby="messageDetailsModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                <div class="modal-header bg-primary text-white"
                    style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h5 class="modal-title fw-bold" id="messageDetailsModalLabel">
                        <i class="mdi mdi-email-open-outline me-2"></i> {!! __('messages.messages_details') !!}
                    </h5>

                </div>
                <div class="modal-body p-4">
                    @if ($selectedMessage)
                        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle p-2 me-3 d-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px;">
                                    <i class="mdi mdi-account text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">
                                        {{ $selectedMessage->sender->name ?? 'Unknown' }}
                                    </h6>
                                    <small class="text-muted">{{ $selectedMessage->sender->email ?? '' }}</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small
                                    class="text-muted d-block fw-bold">{{ $selectedMessage->created_at->format('M d, Y') }}</small>
                                <small class="text-muted">{{ $selectedMessage->created_at->format('h:i A') }}
                                    ({{ $selectedMessage->created_at->diffForHumans() }})</small>
                            </div>
                        </div>

                        <div class="message-content mb-4">
                            <h5 class="fw-bold text-primary mb-3">{{ $selectedMessage->subject }}</h5>
                            <div class="p-3 bg-light rounded shadow-sm"
                                style="min-height: 150px; line-height: 1.6; color: #333; text-wrap: wrap;">
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
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light-dark font-weight-bold px-4"
                        data-bs-dismiss="modal">{!! __('general.close') !!}</button>
                    <button type="button" class="btn btn-primary text-white px-4 shadow-sm" wire:click="reply">
                        <i class="mdi mdi-reply me-1"></i>{!! __('general.replay') !!}
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




