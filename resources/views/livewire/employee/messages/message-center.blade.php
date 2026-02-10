<div class="row">
    <div class="col-md-3 mb-4 {{ app()->getLocale() == 'ar' ? 'float-right' : '' }}">
        <div class="card msg-sidebar-card shadow-sm">
            <div class="card-body p-0">
                <div class="p-3 border-bottom text-center">
                    <button type="button" class="btn btn-primary py-3 w-100 msg-sidebar-btn text-white"
                        data-bs-toggle="modal" data-bs-target="#composeModal">
                        <i class="mdi mdi-pencil me-2"></i> {!! __('messages.compose_message') !!}
                    </button>
                </div>
                <div class="list-group list-group-flush py-2">
                    <a href="javascript:void(0)" wire:click.prevent="setView('inbox')"
                        class="list-group-item list-group-item-action msg-nav-link {{ $currentView === 'inbox' ? 'active' : '' }}">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-inbox mx-2"></i>
                            <span> {!! __('messages.inbox') !!}</span>
                        </div>
                    </a>
                    <a href="javascript:void(0)" wire:click.prevent="setView('sent')"
                        class="list-group-item list-group-item-action msg-nav-link {{ $currentView === 'sent' ? 'active' : '' }}">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-send mx-2"></i>
                            <span> {!! __('messages.sent') !!}</span>
                        </div>
                    </a>
                    <a href="javascript:void(0)" wire:click.prevent="setView('starred')"
                        class="list-group-item list-group-item-action msg-nav-link {{ $currentView === 'starred' ? 'active' : '' }}">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-star mx-2"></i>
                            <span> {!! __('messages.starred') !!}</span>
                        </div>
                    </a>
                    <a href="javascript:void(0)" wire:click.prevent="setView('trash')"
                        class="list-group-item list-group-item-action msg-nav-link {{ $currentView === 'trash' ? 'active' : '' }}">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-delete mx-2"></i>
                            <span> {!! __('messages.trash') !!}</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="col-md-9 {{ app()->getLocale() == 'ar' ? 'float-left' : '' }}">
        @if ($currentView === 'inbox')
            <livewire:employee.messages.inbox wire:key="view-inbox-{{ $currentView }}" />
        @elseif($currentView === 'sent')
            <livewire:employee.messages.sent wire:key="view-sent-{{ $currentView }}" />
        @elseif($currentView === 'starred')
            <livewire:employee.messages.starred wire:key="view-starred-{{ $currentView }}" />
        @elseif($currentView === 'trash')
            <livewire:employee.messages.trash wire:key="view-trash-{{ $currentView }}" />
        @endif
    </div>
</div>
