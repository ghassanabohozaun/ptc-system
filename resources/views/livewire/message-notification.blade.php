@php
    $isAdmin = $guard === 'admin';
    $route = $isAdmin ? 'dashboard.messages.index' : 'employees.messages.index';
@endphp

@if ($isAdmin)
    {{-- Admin Dashboard Layout (Bootstrap 4 - Robust) --}}
    <li class="dropdown dropdown-notification nav-item" wire:poll.5s wire:key="admin-msg-notification">
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
    <li class="nav-item dropdown" wire:poll.5s wire:key="employee-msg-notification">
        <a class="nav-link count-indicator" id="messageDropdown" href="javascript:void(0)" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="{{ $iconClass }}"></i>
            @if ($unreadCount > 0)
                <span class="count" style="{!! Lang() == 'ar' ? 'margin-left: -10px' : 'margin-left: 10px' !!}"></span>
            @endif

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
            aria-labelledby="messageDropdown">
            <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 fw-medium float-start">{!! __('messages.messages') !!}</p>
                @if ($unreadCount > 0)
                    <span class="badge badge-pill badge-primary float-end">
                        {{ $unreadCount }} {!! __('messages.new') !!}
                    </span>
                @endif
            </a>
            <div class="scrollable-container media-list w-100" style="max-height: 300px; overflow-y: auto;">
                @forelse($latestMessages as $msg)
                    <a href="{{ route($route) }}" class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="mdi mdi-email-outline text-white"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject fw-normal text-dark mb-1">{{ $msg->sender->name ?? 'Unknown' }}
                            </h6>
                            <p class="fw-light small-text mb-0">
                                {{ Str::limit($msg->subject, 40) }}
                            </p>
                            <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                        </div>
                    </a>
                @empty
                    <div class="dropdown-item preview-item py-3">
                        <div class="preview-item-content flex-grow text-center">
                            <p class="fw-light small-text mb-0">{!! __('messages.no_new_messages') !!}</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="dropdown-footer text-center py-2 border-top">
                <a href="{{ route($route) }}" class="small text-primary fw-bold text-decoration-none">
                    {!! __('messages.show_all_messages') !!}
                </a>
            </div>
        </div>
    </li>
@endif
