<div class="row align-items-stretch">
    <div class="col-md-3 mb-4">
        <div class="msg-sidebar-card shadow-sm border-0">
            <div class="card-body p-0 h-100 d-flex flex-column">
                <div class="p-3 border-bottom text-center">
                    <button type="button" class="btn msg-sidebar-btn w-100"
                        data-bs-toggle="modal" data-bs-target="#composeModal">
                        <i class="mdi mdi-pencil-outline me-2"></i> {!! __('messages.compose_message') !!}
                    </button>
                </div>
                <div class="nav flex-column py-2 px-2 flex-grow-1">
                    <a href="javascript:void(0)" wire:click.prevent="setView('inbox')"
                        class="nav-link msg-nav-link {{ $currentView === 'inbox' ? 'active' : '' }}">
                        <i class="mdi mdi-inbox-outline"></i>
                        <span> {!! __('messages.inbox') !!}</span>
                    </a>
                    <a href="javascript:void(0)" wire:click.prevent="setView('sent')"
                        class="nav-link msg-nav-link {{ $currentView === 'sent' ? 'active' : '' }}">
                        <i class="mdi mdi-send-outline"></i>
                        <span> {!! __('messages.sent') !!}</span>
                    </a>
                    <a href="javascript:void(0)" wire:click.prevent="setView('starred')"
                        class="nav-link msg-nav-link {{ $currentView === 'starred' ? 'active' : '' }}">
                        <i class="mdi mdi-star-outline"></i>
                        <span> {!! __('messages.starred') !!}</span>
                    </a>
                    <a href="javascript:void(0)" wire:click.prevent="setView('trash')"
                        class="nav-link msg-nav-link {{ $currentView === 'trash' ? 'active' : '' }}">
                        <i class="mdi mdi-delete-outline"></i>
                        <span> {!! __('messages.trash') !!}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="col-md-9 mb-4 {{ app()->getLocale() == 'ar' ? 'float-left' : '' }}">
        <div class="h-100">
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
</div>
