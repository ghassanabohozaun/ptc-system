<div class="content-body">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 mb-3 {{ app()->getLocale() == 'ar' ? 'float_right' : '' }}">
            <div class="card msg-sidebar-card shadow-sm sticky-top" style="top: 20px; z-index: 1;">
                <div class="card-body p-0">
                    <div class="p-1 border-bottom text-center">
                        <button type="button" class="btn btn-primary w-100 msg-sidebar-btn" data-toggle="modal"
                            data-target="#composeModal">
                            <i class="icon-pencil mr-2"></i> {!! __('messages.compose_message') !!}
                        </button>
                    </div>
                    <div class="list-group list-group-flush py-2">
                        <a href="javascript:void(0)" wire:click.prevent="setView('inbox')"
                            class="list-group-item list-group-item-action msg-nav-link {{ $currentView === 'inbox' ? 'active' : '' }}">
                            <div class="d-flex align-items-center">
                                <i class="icon-envelope mr-3 fa-fw"></i>
                                <span>{!! __('messages.inbox') !!}</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" wire:click.prevent="setView('sent')"
                            class="list-group-item list-group-item-action msg-nav-link {{ $currentView === 'sent' ? 'active' : '' }}">
                            <div class="d-flex align-items-center">
                                <i class="icon-paper-plane mr-3 fa-fw"></i>
                                <span>{!! __('messages.sent') !!}</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" wire:click.prevent="setView('starred')"
                            class="list-group-item list-group-item-action msg-nav-link {{ $currentView === 'starred' ? 'active' : '' }}">
                            <div class="d-flex align-items-center">
                                <i class="icon-star mr-3 fa-fw"></i>
                                <span>{!! __('messages.starred') !!}</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" wire:click.prevent="setView('trash')"
                            class="list-group-item list-group-item-action msg-nav-link {{ $currentView === 'trash' ? 'active' : '' }}">
                            <div class="d-flex align-items-center">
                                <i class="icon-trash mr-3 fa-fw"></i>
                                <span>{!! __('messages.trash') !!}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 {{ app()->getLocale() == 'ar' ? 'float_left' : '' }}">
            <div class="container-fluid p-0">
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
