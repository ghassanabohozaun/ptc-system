@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content" id="admin-messages-module">
        <div class="content-wrapper">
            {{-- Content header removed as requested --}}

            @livewire('dashboard.messages.message-center')

        </div>

        <!-- Compose Modal (Premium Design) -->
        <div class="modal modal-pop fade" id="composeModal" tabindex="-1" aria-labelledby="composeModalLabel"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content overflow-hidden">
                    <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title font-weight-bold" id="composeModalLabel">
                            <i class="ft-edit-3 mr-2 text-primary"></i>
                            {!! __('messages.compose_message') !!}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <livewire:dashboard.messages.compose />
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', function() {
            Livewire.on('close-modal', function() {
                $('#composeModal').modal('hide');
            });

            Livewire.on('message-sent', function() {
                // Instead of reload, we can just switch view if we want,
                // but reload is safer for flash messages
                window.location.reload();
            });

            Livewire.on('confirm-delete', function(data) {
                swal({
                    title: "{{ __('general.ask_delete_record') }}",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "{{ __('general.no') }}",
                            value: null,
                            visible: true,
                            className: "btn-danger",
                            closeModal: true,
                        },
                        confirm: {
                            text: "{{ __('general.yes') }}",
                            value: true,
                            visible: true,
                            className: "btn-info",
                            closeModal: true
                        }
                    }
                }).then(isConfirm => {
                    if (isConfirm) {
                        if (data.type === 'bulk') {
                            Livewire.dispatch('doBulkDelete');
                        } else {
                            Livewire.dispatch('doDelete', {
                                messageId: data.id
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush




