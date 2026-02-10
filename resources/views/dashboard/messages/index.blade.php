@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <style>
        .msg-sidebar-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }

        .msg-sidebar-btn {
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(40, 110, 252, 0.2);
            transition: all 0.3s ease;
        }

        .msg-sidebar-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(40, 110, 252, 0.3);
        }

        .msg-nav-link {
            padding: 14px 20px !important;
            /* border-radius: 8px !important;
                       margin: 4px 12px; */
            border: none !important;
            color: #555 !important;
            transition: all 0.2s ease;
        }

        .msg-nav-link i {
            font-size: 1.1rem;
            opacity: 0.7;
            transition: all 0.2s ease;
        }

        .msg-nav-link:hover {
            background-color: #f0f4ff !important;
            color: #286efc !important;
        }

        .msg-nav-link:hover i {
            opacity: 1;
        }

        .msg-nav-link.active {
            background: linear-gradient(45deg, #286efc, #4e8eff) !important;
            color: #fff !important;
            box-shadow: 0 4px 10px rgba(40, 110, 252, 0.2);
        }

        .msg-nav-link.active i {
            opacity: 1;
            color: #fff !important;
        }

        .msg-main-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }

        .msg-list-item {
            transition: background-color 0.2s;
            border-left: 3px solid transparent;
        }

        .msg-list-item:hover {
            background-color: #fbfcfe;
            z-index: 10;
        }

        .msg-list-item.unread {
            border-left-color: #286efc;
            background-color: #f4f8ff;
        }

        .msg-list-item.unread:hover {
            background-color: #ecf3ff;
        }

        .msg-star {
            color: #ccc;
            transition: color 0.2s;
            cursor: pointer;
        }

        .msg-star.starred {
            color: #ffc107;
        }

        .msg-star:hover {
            color: #ffc107;
        }

        .msg-badge-new {
            background-color: #286efc;
            color: #fff;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
            vertical-align: middle;
        }

        /* RTL Adjustments */
        [data-textdirection="rtl"] .msg-list-item.unread {
            border-left: none;
            border-right: 3px solid #286efc;
        }

        [data-textdirection="rtl"] .msg-nav-link i {
            margin-left: 12px !important;
            margin-right: 0 !important;
        }

        /* Hide pagination results summary */
        .pagination-container nav>div:first-child {
            display: none !important;
        }

        .pagination-container nav>div:last-child {
            width: 100%;
            display: flex;
            justify-content: center;
        }
    </style>
@endpush


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('dashboard.messages') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{!! __('dashboard.dashboard') !!}</a></li>
                                <li class="breadcrumb-item active">{!! __('dashboard.messages') !!}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            @livewire('dashboard.messages.message-center')

        </div>

        <!-- Compose Modal -->
        <div class="modal fade" id="composeModal" tabindex="-1" aria-labelledby="composeModalLabel" aria-hidden="true"
            wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="composeModalLabel">{!! __('messages.compose_message') !!}</h5>
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
