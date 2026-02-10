@extends('layouts.employees.app')

@section('title')
    {!! __('dashboard.dashboard') !!}
@endsection

@push('style')
    <style>
        .msg-sidebar-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            padding: 20px;
        }

        .msg-sidebar-btn {
            /* padding: 12px; */
            /* border-radius: 10px; */
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(75, 73, 172, 0.2);
            transition: all 0.3s ease;
        }

        .msg-sidebar-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(75, 73, 172, 0.3);
        }

        .msg-nav-link {
            /* padding: 12px 18px !important; */
            border-radius: 8px !important;
            margin: 3px 1px;
            /* margin-right: 20px border: none !important; */
            color: #6c799d !important;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .msg-nav-link i {
            font-size: 1.0rem;
            opacity: 0.7;
            transition: all 0.2s ease;
        }

        .msg-nav-link:hover {
            background-color: #f8f9ff !important;
            color: #4b49ac !important;
        }

        .msg-nav-link:hover i {
            opacity: 1;
        }

        .msg-nav-link.active {
            background: linear-gradient(45deg, #4b49ac, #7da0fa) !important;
            color: #fff !important;
            box-shadow: 0 4px 10px rgba(75, 73, 172, 0.2);
        }

        .msg-nav-link.active i {
            opacity: 1;
            color: #fff !important;
        }

        .msg-main-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .msg-list-item {
            transition: background-color 0.2s;
            border-left: 3px solid transparent;
            cursor: pointer;
        }

        .msg-list-item:hover {
            background-color: #fbfcfe;
        }

        .msg-list-item.unread {
            border-left-color: #4b49ac;
            background-color: #f4f8ff;
            font-weight: 700;
        }

        .msg-list-item.unread:hover {
            background-color: #ecf3ff;
        }

        .msg-star {
            color: #dee2e6;
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
            background-color: #4b49ac;
            color: #fff;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
            vertical-align: middle;
        }

        /* RTL Adjustments */
        [data-textdirection="rtl"] .msg-list-item.unread {
            border-left: none;
            border-right: 3px solid #4b49ac;
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
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom mb-4">
                        <h3 class="text-dark fw-bold">
                            <i class="mdi mdi-email-outline me-2"></i> {!! __('messages.messages') !!}
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('employees.overview') }}">{!! __('dashboard.dashboard') !!}</a>
                                </li>
                                <li class="breadcrumb-item"> &nbsp; {!! __('messages.messages') !!}</li>
                                &nbsp;
                            </ol>
                        </nav>
                    </div>

                    @livewire('employee.messages.message-center')

                </div>
            </div>
        </div>

        <!-- Compose Modal -->
        <div class="modal fade" id="composeModal" tabindex="-1" role="dialog" aria-labelledby="composeModalLabel"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="composeModalLabel">{!! __('messages.compose_message') !!}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <livewire:employee.messages.compose />
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
                var modalElement = document.getElementById('composeModal');
                var modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modal.hide();
            });

            Livewire.on('message-sent', function() {
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
