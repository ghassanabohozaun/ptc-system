<div class="content-body h-100">
    <div class="row align-items-stretch h-100">
        <!-- Sidebar -->
        <div class="col-xl-2 col-lg-3 col-md-4 mb-4 h-100">
            <div class="msg-sidebar-card shadow-sm border-0 h-100">
                <div class="card-body p-0 d-flex flex-column h-100">
                    <div class="msg-sidebar-btn-container border-bottom text-center">
                        <button type="button" class="btn msg-sidebar-btn w-100 shadow-none" data-toggle="modal"
                            data-target="#composeModal">
                            <i class="la la-plus-circle mr-2"></i> {!! __('messages.compose_message') !!}
                        </button>
                    </div>
                    <div class="nav flex-column py-3 flex-grow-1">
                        <a href="javascript:void(0)" wire:click.prevent="setView('inbox')"
                            class="nav-link msg-nav-link d-flex justify-content-between align-items-center {{ $currentView === 'inbox' ? 'active' : '' }}">
                            <div>
                                <i class="la la-inbox mr-2 text-primary"></i>
                                <span>{!! __('messages.inbox') !!}</span>
                            </div>
                            @if($counts['inbox'] > 0)
                                <span class="msg-count-badge">{{ $counts['inbox'] }}</span>
                            @endif
                        </a>
                        <a href="javascript:void(0)" wire:click.prevent="setView('sent')"
                            class="nav-link msg-nav-link d-flex justify-content-between align-items-center {{ $currentView === 'sent' ? 'active' : '' }}">
                            <div>
                                <i class="la la-paper-plane mr-2 text-info"></i>
                                <span>{!! __('messages.sent') !!}</span>
                            </div>
                            @if($counts['sent'] > 0)
                                <span class="msg-count-badge">{{ $counts['sent'] }}</span>
                            @endif
                        </a>
                        <a href="javascript:void(0)" wire:click.prevent="setView('starred')"
                            class="nav-link msg-nav-link d-flex justify-content-between align-items-center {{ $currentView === 'starred' ? 'active' : '' }}">
                            <div>
                                <i class="la la-star mr-2 text-warning"></i>
                                <span>{!! __('messages.starred') !!}</span>
                            </div>
                            @if($counts['starred'] > 0)
                                <span class="msg-count-badge">{{ $counts['starred'] }}</span>
                            @endif
                        </a>
                        <a href="javascript:void(0)" wire:click.prevent="setView('trash')"
                            class="nav-link msg-nav-link d-flex justify-content-between align-items-center {{ $currentView === 'trash' ? 'active' : '' }}">
                            <div>
                                <i class="la la-trash mr-2 text-danger"></i>
                                <span>{!! __('messages.trash') !!}</span>
                            </div>
                            @if($counts['trash'] > 0)
                                <span class="msg-count-badge">{{ $counts['trash'] }}</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-xl-10 col-lg-9 col-md-8 mb-4 h-100">
            <div class="h-100 content-body-container">
                @if ($currentView === 'inbox')
                    <livewire:dashboard.messages.inbox wire:key="view-inbox-{{ $currentView }}" />
                @elseif($currentView === 'sent')
                    <livewire:dashboard.messages.sent wire:key="view-sent-{{ $currentView }}" />
                @elseif($currentView === 'starred')
                    <livewire:dashboard.messages.starred wire:key="view-starred-{{ $currentView }}" />
                @elseif($currentView === 'trash')
                    <livewire:dashboard.messages.trash wire:key="view-trash-{{ $currentView }}" />
                @endif
            </div>
        </div>
    </div>
</div>
