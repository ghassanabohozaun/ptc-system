<form wire:submit.prevent="sendMessage" class="compose-modern-form">
    <div class="row no-gutters compose-row-container">
        <!-- Left Sidebar: Recipients -->
        <div class="col-md-5 d-flex flex-column border-msg-sidebar bg-premium-sidebar">
            <!-- Search Header (Glass Effect) -->
            <div class="p-3 border-bottom glass-header sticky-top pt-11px">
                <div class="input-group input-group-merge premium-search-bar transition-all shadow-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent border-0 px-2">
                            <i class="la la-search text-primary font-medium-3"></i>
                        </span>
                    </div>
                    <input type="text" wire:model.live="search" class="form-control border-0 bg-transparent py-2 px-2"
                        placeholder="{!! __('messages.search_by_name_or_email') !!}">
                </div>
            </div>

            <!-- Recipients List (Custom Scroll) -->
            <div class="flex-grow-1 overflow-auto custom-scrollbar recipients-list-container">
                @if ($sendToAll)
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 p-5 text-center fade-in">
                        <div class="broadcast-icon-box shadow-pulse mb-4">
                            <i class="la la-bullhorn text-white font-large-3"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark mb-2">{!! __('messages.broadcast_active') !!}</h5>
                        <p class="text-muted small px-3">{!! __('messages.sending_to_all_active_employees_desc') !!}</p>
                    </div>
                @else
                    <div class="p-2">
                        <ul class="list-group list-group-flush">
                            @forelse($employees as $employee)
                                @php
                                    $initials = strtoupper(substr($employee->first_name, 0, 1) . substr($employee->family_name, 0, 1));
                                    $colors = ['#6366f1', '#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'];
                                    $bgColor = $colors[$employee->id % count($colors)];
                                @endphp
                                <li class="list-group-item list-group-item-action border-0 mb-2 rounded-xl transition-all-300 recipient-card {{ in_array($employee->id, $recipients) ? 'card-selected' : '' }}">
                                    <div class="custom-control custom-checkbox custom-control-indigo d-flex align-items-center w-100 py-1">
                                        <input class="custom-control-input" type="checkbox" wire:model.live="recipients"
                                            value="{{ $employee->id }}" id="emp_{{ $employee->id }}">
                                        <label class="custom-control-label w-100 cursor-pointer d-flex align-items-center" for="emp_{{ $employee->id }}">
                                            <!-- Avatar Circle -->
                                            <div class="avatar-circle mr-3 shadow-xs" style="--avatar-bg: {{ $bgColor }}">
                                                {{ $initials }}
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="text-dark font-weight-bold d-block">
                                                    {{ $employee->first_name }} {{ $employee->family_name }}
                                                </span>
                                                <small class="text-muted d-block mt-1 font-weight-500">{{ $employee->email }}</small>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item text-center text-muted py-5 border-0 bg-transparent">
                                    <div class="empty-state-icon mb-3">
                                        <i class="la la-users-slash font-large-3 opacity-20"></i>
                                    </div>
                                    <p class="mb-0 font-weight-bold small text-muted-2">{!! __('messages.no_employees_found') !!}</p>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                @endif
            </div>

            <!-- Selection Sticky Footer (Stacked & Premium) -->
            @if (!$sendToAll)
                <div class="p-4 border-top bg-white/95 glass-footer d-flex flex-column align-items-center">
                    <div class="selection-counter-premium shadow-xs d-flex align-items-center py-2 px-4 w-100 justify-content-center mb-3">
                         <span class="text-indigo-dark font-weight-black mr-2">{{ count($recipients) }}</span>
                         <span class="text-muted-2 font-weight-bold">{!! __('messages.selected_employees') !!}</span>
                    </div>
                    @if (count($recipients) > 0)
                        <button type="button" wire:click="$set('recipients', [])"
                            class="btn btn-premium-danger-soft btn-sm rounded-pill w-100 py-2 font-weight-bold transition-all-300">
                            <i class="la la-trash-alt mr-1"></i> {!! __('messages.clear') !!}
                        </button>
                    @endif
                </div>
            @endif
        </div>

        <!-- Right Content: Message Form -->
        <div class="col-md-7 d-flex flex-column bg-white main-form-area">
            <div class="p-5 flex-grow-1 overflow-auto custom-scrollbar pt-11px">
                <!-- Send to All: Premium Switch -->
                <div class="mb-5 premium-broadcast-box shadow-sm transition-all-300">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="icon-orb mr-3 shadow-xs">
                                <i class="la la-bullhorn text-indigo"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 font-weight-bold text-dark-blue">{!! __('messages.sent_to_all_employees') !!}</h6>
                                <p class="text-muted small mb-0">{!! __('messages.broadcast_mode_hint') !!}</p>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-indigo custom-control-lg scale-125">
                            <input type="checkbox" wire:model.live="sendToAll" class="custom-control-input" id="sendToAllSwitch">
                            <label class="custom-control-label cursor-pointer" for="sendToAllSwitch"></label>
                        </div>
                    </div>
                </div>

                @if (!$sendToAll)
                    @error('recipients')
                        <div class="alert alert-soft-danger py-3 px-4 mb-5 border-0 rounded-2xl flex align-items-center shadow-xs fade-in">
                            <i class="la la-info-circle mr-3 font-medium-4"></i> 
                            <span class="font-weight-600">{{ $message }}</span>
                        </div>
                    @enderror
                @endif

                <!-- Form Fields -->
                <div class="space-y-5">
                    <!-- Subject -->
                    <div class="form-group-premium focus-within-glow">
                        <label class="form-label font-weight-bold text-indigo-dark mb-2 small text-uppercase letter-spacing-2">
                           <i class="la la-tag mr-1"></i> {!! __('messages.subject') !!}
                        </label>
                        <div class="input-group input-group-merge premium-input-wrapper shadow-xs">
                            <input type="text" wire:model="subject" class="form-control premium-input border-0 bg-transparent pl-4"
                                placeholder="{!! __('messages.enter_message_subject') !!}">
                        </div>
                        @error('subject')
                            <span class="text-danger mt-1 d-block font-weight-bold small ml-2 fade-in">
                                <i class="la la-exclamation-triangle mr-1"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Message Body -->
                    <div class="form-group-premium mt-4">
                        <label class="form-label font-weight-bold text-indigo-dark mb-2 small text-uppercase letter-spacing-2">
                           <i class="la la-paragraph mr-1"></i> {!! __('messages.message_body') !!}
                        </label>
                        <div class="premium-textarea-wrapper shadow-xs">
                            <textarea wire:model="body" rows="10" class="form-control premium-textarea border-0 bg-transparent p-4 no-resize"
                                placeholder="{!! __('messages.write_your_message_here') !!}"></textarea>
                        </div>
                        @error('body')
                            <span class="text-danger mt-1 d-block font-weight-bold small ml-2 fade-in">
                                <i class="la la-exclamation-triangle mr-1"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Footer Actions: Simplified -->
            <div class="px-5 py-4 border-top bg-white d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-premium-send px-5 shadow-indigo-lg font-weight-bold transition-3d-hover">
                    <span>{!! __('messages.send_message') !!}</span>
                    <i class="la la-paper-plane ml-2 font-medium-2"></i>
                </button>
            </div>
        </div>
    </div>

</form>
