@if (auth('employee')->check())
    {{-- Employee Dashboard Layout (Bootstrap 5) --}}
    <li class="nav-item dropdown" wire:poll.10s>
        <a class="nav-link count-indicator" id="notificationDropdown" href="javascript:void(0)" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="icon-bell"></i>
            @if ($unreadCount > 0)
                <span class="count">{{ $unreadCount }}</span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
            aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 fw-medium float-start">{!! __('general.notifications') !!}</p>
                @if ($unreadCount > 0)
                    <span class="badge badge-pill badge-primary float-end">{{ $unreadCount }}
                        {{ __('general.new') }}</span>
                @endif
            </a>
            <div class="scrollable-container media-list w-100" style="max-height: 300px; overflow-y: auto;">
                @forelse($notifications as $notification)
                    <a class="dropdown-item preview-item py-3" href="javascript:void(0)"
                        wire:click="markAsRead('{{ $notification->id }}')">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="mdi mdi-file-document text-white"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            @if (isset($notification->data['type']) && $notification->data['type'] == 'monthly_report_status')
                                <h6 class="preview-subject fw-normal text-dark mb-1">
                                    {{ __('general.report_status_updated') }}</h6>
                                <p class="fw-light small-text mb-0">
                                    {{ isset($notification->data['month']) ? $notification->data['month'] . '/' . $notification->data['year'] : '' }}
                                    : <span
                                        class="badge badge-info">{{ __('monthlyReports.' . $notification->data['status'] ?? '') }}</span>
                                </p>
                            @else
                                <h6 class="preview-subject fw-normal text-dark mb-1">
                                    {{ __('general.report_sent_waiting_admin') }}</h6>
                                <p class="fw-light small-text mb-0">
                                    {{ isset($notification->data['month']) ? $notification->data['month'] . '/' . $notification->data['year'] : '' }}
                                </p>
                            @endif

                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                            </small>
                        </div>
                    </a>
                @empty
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-item-content">
                            <p class="fw-light small-text mb-0 text-center">{{ __('general.no_new_notifications') }}
                            </p>
                        </div>
                    </a>
                @endforelse
                @if ($unreadCount > 0)
                    <div class="dropdown-footer text-center py-2 border-top">
                        <a href="javascript:void(0)" wire:click.prevent="markAllAsRead"
                            class="small text-primary fw-bold text-decoration-none">
                            {{ __('general.mark_all_as_read') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </li>
@else
    {{-- Admin Dashboard Layout (Bootstrap 4) --}}
    <li class="dropdown dropdown-notification nav-item" wire:poll.10s>
        <a class="nav-link nav-link-label" href="javascript:void(0)" data-toggle="dropdown">
            <i class="ficon ft-bell"></i>
            @if ($unreadCount > 0)
                <span
                    class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">{{ $unreadCount }}</span>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
            <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">{!! __('general.notifications') !!}</span>
                </h6>
                @if ($unreadCount > 0)
                    <span class="notification-tag badge badge-default badge-danger float-right m-0">{{ $unreadCount }}
                        {{ __('general.new') }}</span>
                @endif
            </li>
            <li class="scrollable-container media-list w-100" style="max-height: 300px; overflow-y: auto;">
                @forelse($notifications as $notification)
                    <a href="javascript:void(0)" wire:click="markAsRead('{{ $notification->id }}')">
                        <div class="media">
                            <div class="media-left align-self-center">
                                <i class="ft-file icon-bg-circle bg-teal"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">{{ __('general.new_monthly_report') }}</h6>
                                <p class="notification-text font-small-3 text-muted">
                                    {{ __('general.from') }}
                                    {{ $notification->data['employee_name'] ?? __('general.employee') }}
                                    ({{ $notification->data['month'] }}/{{ $notification->data['year'] }})
                                </p>
                                <small>
                                    <time class="media-meta text-muted" datetime="{{ $notification->created_at }}">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </time>
                                </small>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="p-2 text-center text-muted">{{ __('general.no_new_notifications') }}</div>
                @endforelse
            </li>
            @if ($unreadCount > 0)
                <li class="dropdown-menu-footer">
                    <a class="dropdown-item text-muted text-center" href="javascript:void(0)"
                        wire:click.prevent="markAllAsRead">
                        {{ __('general.mark_all_as_read') }}
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
