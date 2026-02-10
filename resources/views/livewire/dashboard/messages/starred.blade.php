<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><i class="fas fa-star mr-2 text-warning"></i>{!! __('messages.starred') !!}</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="card-content collapse show">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 40px;"><i class="fas fa-star text-warning"></i></th>
                                <th style="width: 200px;">{!! __('messages.user') !!}</th>
                                <th>{!! __('messages.subject') !!}</th>
                                <th style="width: 150px;">{!! __('messages.date') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr wire:key="msg-{{ $message->id }}">
                                    <td>
                                        <span wire:click="toggleStar({{ $message->id }})"
                                            class="msg-star {{ $message->is_starred ? 'starred' : '' }}"
                                            style="cursor: pointer;">
                                            <i
                                                class="{{ $message->is_starred ? 'fas' : 'far' }} fa-star {{ $message->is_starred ? 'text-warning' : 'text-muted' }}"></i>
                                        </span>
                                    </td>
                                    <td class="text-truncate" style="max-width: 200px;">
                                        @php
                                            $admin = auth()->guard('admin')->user();
                                        @endphp
                                        @if ($message->sender_id == $admin->id && $message->sender_type == get_class($admin))
                                            {!! __('messages.to') !!} : {{ $message->receiver->name ?? 'Unknown' }}
                                        @else
                                            {!! __('messages.from') !!} : {{ $message->sender->name ?? 'Unknown' }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 600px;">
                                            <a href="#" wire:click.prevent="showMessage({{ $message->id }})"
                                                class="text-dark text-decoration-none">
                                                <span class="font-weight-600">{{ $message->subject }}</span>
                                                <span class="text-muted font-weight-normal small ml-1">
                                                    - {{ Str::limit(strip_tags($message->body), 80) }}
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="small text-muted">
                                        {{ $message->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="fas fa-star fa-3x mb-3 opacity-25"></i>
                                        <p class="mb-0">{!! __('messages.no_starred_messages') !!}</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($messages->total() > $messages->perPage())
                    <div class="pagination-container mt-3">
                        {{ $messages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Message Details Modal -->
    <div class="modal fade" id="messageDetailsModal" tabindex="-1" role="dialog"
        aria-labelledby="messageDetailsModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <div class="modal-header bg-primary text-white"
                    style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h5 class="modal-title font-weight-bold" id="messageDetailsModalLabel">
                        <i class="fas fa-envelope-open-text mr-2"></i>Message Details
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
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
                        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle p-2 mr-3 d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;">
                                    <i class="fas fa-user-alt fa-lg text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 font-weight-bold text-dark">{{ $isSent ? 'To' : 'From' }}:
                                        {{ $displayUser->name ?? 'Unknown' }}</h6>
                                    <small class="text-muted d-block">{{ $displayUser->email ?? '' }}</small>
                                </div>
                            </div>
                            <div class="text-right">
                                <small
                                    class="text-muted d-block font-weight-bold">{{ $selectedMessage->created_at->format('M d, Y') }}</small>
                                <small class="text-muted">{{ $selectedMessage->created_at->format('h:i A') }}
                                    ({{ $selectedMessage->created_at->diffForHumans() }})</small>
                            </div>
                        </div>

                        <div class="message-content mb-4">
                            <h5 class="font-weight-bold text-primary mb-3">{{ $selectedMessage->subject }}</h5>
                            <div class="p-4 bg-light rounded message-body shadow-sm"
                                style="min-height: 200px; line-height: 1.7; color: #333; font-size: 1.05rem; border: 1px solid #e9ecef;">
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
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary px-4"
                        data-dismiss="modal">{!! __('general.close') !!}</button>
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
</div>
