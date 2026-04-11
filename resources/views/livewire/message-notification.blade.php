@php
    $isAdmin = $guard === 'admin';
    $route = $isAdmin ? 'dashboard.messages.index' : 'employees.messages.index';
@endphp

@if ($isAdmin)
    {{-- Admin Dashboard Layout (Bootstrap 4 - Robust) --}}
    <li class="dropdown dropdown-notification nav-item" wire:poll.30s wire:key="admin-msg-notification">
        <a class="nav-link nav-link-label" id="messageDropdown" href="javascript:void(0)" data-toggle="dropdown">
            <i class="{{ $iconClass }}"></i>
            @if ($unreadCount > 0)
                <span class="badge badge-pill badge-default badge-danger badge-up badge-glow">
                    {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                </span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <div class="dropdown-header-main">
                <h6 class="header-title">{!! __('messages.messages') !!}</h6>
                @if ($unreadCount > 0)
                    <span class="premium-badge-count">{{ $unreadCount }} {!! __('messages.new') !!}</span>
                @endif
            </div>

            <div class="scrollable-container media-list w-100 custom-scrollbar"
                style="max-height: 350px; overflow-y: auto;">
                @forelse($latestMessages as $msg)
                    <a href="{{ route($route) }}" class="preview-item-premium">
                        <div class="preview-thumbnail-premium bg-cyan">
                            <i class="ft-mail"></i>
                        </div>
                        <div class="preview-item-content-premium">
                            <span class="subject">{{ $msg->sender->name ?? 'Unknown' }}</span>
                            <span class="message-text">{{ Str::limit($msg->subject, 40) }}</span>
                            <span class="time">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                    </a>
                @empty
                    <div class="p-4 text-center">
                        <p class="fw-light small-text mb-0 text-muted">{!! __('messages.no_new_messages') !!}</p>
                    </div>
                @endforelse
            </div>

            <div class="dropdown-footer-premium">
                <a href="{{ route($route) }}">
                    {!! __('messages.show_all_messages') !!}
                </a>
            </div>
        </div>
    </li>
@else
    {{-- Employee Dashboard Layout (Bootstrap 5 - StarAdmin) --}}
    <li class="nav-item dropdown" wire:poll.30s wire:key="employee-msg-notification">
        <a class="nav-link count-indicator" id="messageDropdown" href="javascript:void(0)" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="{{ $iconClass }}"></i>
            @if ($unreadCount > 0)
                <span class="count">{{ $unreadCount > 99 ? '99+' : $unreadCount }}</span>
            @endif

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <div class="dropdown-header-main">
                <h6 class="header-title">{!! __('messages.messages') !!}</h6>
                @if ($unreadCount > 0)
                    <span class="premium-badge-count">{{ $unreadCount }} {!! __('messages.new') !!}</span>
                @endif
            </div>

            <div class="scrollable-container media-list w-100 custom-scrollbar"
                style="max-height: 350px; overflow-y: auto;">
                @forelse($latestMessages as $msg)
                    <a href="{{ route($route) }}" class="preview-item-premium">
                        <div class="preview-thumbnail-premium bg-primary">
                            <i class="mdi mdi-email-open-outline"></i>
                        </div>
                        <div class="preview-item-content-premium">
                            <span class="subject">{{ $msg->sender->name ?? 'Unknown' }}</span>
                            <span class="message-text">{{ Str::limit($msg->subject, 40) }}</span>
                            <span class="time">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                    </a>
                @empty
                    <div class="p-4 text-center">
                        <p class="fw-light small-text mb-0 text-muted">{!! __('messages.no_new_messages') !!}</p>
                    </div>
                @endforelse
            </div>

            <div class="dropdown-footer-premium">
                <a href="{{ route($route) }}">
                    {!! __('messages.show_all_messages') !!}
                </a>
            </div>
        </div>
    </li>
@endif
