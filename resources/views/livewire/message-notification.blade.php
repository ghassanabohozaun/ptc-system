@php
    $isAdmin = $guard === 'admin';
    $route = $isAdmin ? 'dashboard.messages.index' : 'employees.messages.index';
@endphp

@if ($isAdmin)
    {{-- Admin Dashboard Layout (Bootstrap 4 - Robust) --}}
    <li class="dropdown dropdown-notification nav-item" wire:poll.30s wire:key="admin-msg-notification">
        <a class="nav-link nav-link-label" href="javascript:void(0)" data-toggle="dropdown">
            <i class="{{ $iconClass }}"></i>
            @if ($unreadCount > 0)
                <span class="badge badge-pill badge-default badge-danger badge-up badge-glow">
                    {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                </span>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
            <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">{!! __('messages.messages') !!}</span>
                </h6>
                @if ($unreadCount > 0)
                    <span class="notification-tag badge badge-default badge-warning float-right m-0">
                        {{ $unreadCount }} {!! __('messages.new') !!}
                    </span>
                @endif
            </li>
            <li class="scrollable-container media-list w-100">
                @forelse($latestMessages as $msg)
                    <a href="{{ route($route) }}">
                        <div class="media">
                            <div class="media-left align-self-center">
                                <i class="ft-mail icon-bg-circle bg-cyan"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">{{ $msg->sender->name ?? 'Unknown' }}</h6>
                                <p class="notification-text font-small-3 text-muted">
                                    {{ Str::limit($msg->subject, 40) }}
                                </p>
                                <small>
                                    <time class="media-meta text-muted">{{ $msg->created_at->diffForHumans() }}</time>
                                </small>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="p-4 text-center text-muted">
                        <small>{!! __('messages.no_new_messages') !!}</small>
                    </div>
                @endforelse
            </li>
            <li class="dropdown-menu-footer">
                <a class="dropdown-item text-muted text-center fw-bold" href="{{ route($route) }}">
                    {!! __('messages.show_all_messages') !!}
                </a>
            </li>
        </ul>
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
