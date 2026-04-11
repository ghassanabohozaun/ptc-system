@if (auth('employee')->check())
    {{-- Employee Dashboard Layout (Bootstrap 5) --}}
    <li class="nav-item dropdown" wire:poll.10s>
        <a class="nav-link count-indicator" id="notificationDropdown" href="javascript:void(0)" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="icon-bell"></i>
            @if ($unreadCount > 0)
                <span class="count">{{ $unreadCount > 99 ? '99+' : $unreadCount }}</span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
            aria-labelledby="notificationDropdown">
            <div class="dropdown-header-main">
                <h6 class="header-title">{!! __('general.notifications') !!}</h6>
                @if ($unreadCount > 0)
                    <span class="premium-badge-count">{{ $unreadCount }} {{ __('general.new') }}</span>
                @endif
            </div>

            <div class="scrollable-container media-list w-100 custom-scrollbar"
                style="max-height: 350px; overflow-y: auto;">
                @forelse($notifications as $notification)
                    @php
                        $bgClass =
                            isset($notification->data['type']) && $notification->data['type'] == 'monthly_report_status'
                                ? 'bg-success'
                                : 'bg-info';
                        $icon =
                            isset($notification->data['type']) && $notification->data['type'] == 'monthly_report_status'
                                ? 'mdi-file-check-outline'
                                : 'mdi-file-send-outline';
                    @endphp
                    <a class="preview-item-premium" href="javascript:void(0)"
                        wire:click="markAsRead('{{ $notification->id }}')">
                        <div class="preview-thumbnail-premium {{ $bgClass }}">
                            <i class="mdi {{ $icon }}"></i>
                        </div>
                        <div class="preview-item-content-premium">
                            <span class="subject">
                                {{ isset($notification->data['type']) && $notification->data['type'] == 'monthly_report_status' ? __('general.report_status_updated') : __('general.report_sent_waiting_admin') }}
                            </span>
                            <span class="message-text">
                                {{ isset($notification->data['month']) ? $notification->data['month'] . '/' . $notification->data['year'] : '' }}
                                @if (isset($notification->data['status']))
                                    : <span
                                        class="badge badge-info">{{ __('monthlyReports.' . $notification->data['status'] ?? '') }}</span>
                                @endif
                            </span>
                            <span class="time">
                                {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="p-4 text-center">
                        <p class="fw-light small-text mb-0 text-muted">{{ __('general.no_new_notifications') }}</p>
                    </div>
                @endforelse
            </div>

            @if ($unreadCount > 0)
                <div class="dropdown-footer-premium">
                    <a href="javascript:void(0)" wire:click.prevent="markAllAsRead">
                        {{ __('general.mark_all_as_read') }}
                    </a>
                </div>
            @endif
        </div>
    </li>
@else
    {{-- Admin Dashboard Layout (Bootstrap 4) --}}
    <li class="dropdown dropdown-notification nav-item" wire:poll.10s>
        <a class="nav-link nav-link-label" id="notificationDropdown" href="javascript:void(0)" data-toggle="dropdown">
            <i class="ficon ft-bell"></i>
            @if ($unreadCount > 0)
                <span
                    class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">{{ $unreadCount }}</span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
            aria-labelledby="notificationDropdown">
            <div class="dropdown-header-main">
                <h6 class="header-title">{!! __('general.notifications') !!}</h6>
                @if ($unreadCount > 0)
                    <span class="premium-badge-count">{{ $unreadCount }}
                        {{ __('general.new') }}</span>
                @endif
            </div>
            <div class="scrollable-container media-list w-100 custom-scrollbar"
                style="max-height: 350px; overflow-y: auto;">
                @forelse($notifications as $notification)
                    <a class="preview-item-premium" href="javascript:void(0)"
                        wire:click="markAsRead('{{ $notification->id }}')">
                        <div class="preview-thumbnail-premium bg-teal">
                            <i class="ft-file"></i>
                        </div>
                        <div class="preview-item-content-premium">
                            <span class="subject">{{ __('general.new_monthly_report') }}</span>
                            <span class="message-text">
                                {{ __('general.from') }}
                                {{ $notification->data['employee_name'] ?? __('general.employee') }}
                                ({{ $notification->data['month'] }}/{{ $notification->data['year'] }})
                            </span>
                            <span class="time">
                                {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="p-4 text-center">
                        <p class="fw-light small-text mb-0 text-muted">{{ __('general.no_new_notifications') }}</p>
                    </div>
                @endforelse
            </div>
            @if ($unreadCount > 0)
                <div class="dropdown-footer-premium">
                    <a href="javascript:void(0)" wire:click.prevent="markAllAsRead">
                        {{ __('general.mark_all_as_read') }}
                    </a>
                </div>
            @endif
        </div>
    </li>
@endif
