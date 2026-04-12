<div id="admin-messages-module" class="h-100">
    <form wire:submit.prevent="sendMessage" class="compose-modern-form overflow-hidden compose-modern-form-wrapper h-100">
        <div class="row no-gutters compose-row-container h-100">
            <!-- Left Sidebar: Recipients -->
            <div class="col-md-4 d-flex flex-column border-msg-sidebar bg-premium-sidebar h-100">
                <!-- Search Header (Glass Effect) -->
                <div class="px-2 py-1 border-bottom glass-header sticky-top">
                    <div class="input-group input-group-merge premium-search-bar transition-all shadow-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 px-2">
                                <i class="la la-search text-primary font-large-1"></i>
                            </span>
                        </div>
                        <input type="text" wire:model.live="search"
                            class="form-control border-0 bg-transparent py-1 px-2 font-weight-bold premium-input-search"
                            placeholder="{!! __('messages.search') !!}">
                    </div>
                </div>

                <!-- Recipients List (Custom Scroll) -->
                <div class="flex-grow-1 overflow-auto custom-scrollbar recipients-list-container">
                    @if ($sendToAll)
                        <div
                            class="d-flex flex-column align-items-center justify-content-center h-100 py-5 px-2 text-center fade-in">
                            <div class="broadcast-icon-box shadow-pulse mb-4 broadcast-icon-orb-lg">
                                <i class="la la-bullhorn text-white font-large-3"></i>
                            </div>
                            <h5 class="font-weight-black text-dark mb-2">{!! __('messages.broadcast_active') !!}</h5>
                            <p class="text-muted font-weight-bold broadcast-desc-premium">{!! __('messages.sending_to_all_active_employees_desc') !!}</p>
                        </div>
                    @else
                        <div>
                            <ul class="list-group list-group-flush">
                                @forelse($employees as $employee)
                                    @php
                                        $initials = strtoupper(
                                            substr($employee->first_name, 0, 1) . substr($employee->family_name, 0, 1),
                                        );
                                        $colors = ['#6366f1', '#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'];
                                        $bgColor = $colors[$employee->id % count($colors)];
                                    @endphp
                                    <li class="list-group-item list-group-item-action border-0 mb-0 py-2 px-1 bg-transparent recipient-row {{ in_array($employee->id, $recipients) ? 'row-selected' : '' }} recipient-clickable-row"
                                        wire:click="toggleRecipient({{ $employee->id }})">
                                        <div class="d-flex align-items-center w-100 overflow-hidden">
                                            <div class="custom-control custom-checkbox custom-control-indigo no-events">
                                                <input class="custom-control-input" type="checkbox"
                                                    wire:model.live="recipients" value="{{ $employee->id }}"
                                                    id="emp_{{ $employee->id }}">
                                                <label class="custom-control-label"
                                                    for="emp_{{ $employee->id }}"></label>
                                            </div>
                                            <div class="ml-1 flex-grow-1">
                                                <span
                                                    class="text-indigo font-weight-black d-block mb-0 employee-primary-name">
                                                    {{ $employee->first_name }} {{ $employee->family_name }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center text-muted py-5 border-0 bg-transparent">
                                        <div class="empty-state-icon mb-3">
                                            <i class="la la-user-slash font-large-3 opacity-20"></i>
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
                    <div class="p-2 border-top bg-white glass-footer d-flex flex-column align-items-center">
                        @error('recipients')
                            <div
                                class="text-danger mb-2 px-1 d-flex align-items-center fade-in w-100 validation-alert-text">
                                <i class="la la-exclamation-circle mr-1 font-medium-3"></i>
                                <span class="font-weight-black text-uppercase">{{ $message }}</span>
                            </div>
                        @enderror
                        <div
                            class="selection-counter-premium shadow-xs d-flex align-items-center py-2 px-2 w-100 justify-content-center mb-2 bg-light-indigo rounded-pill">
                            <span
                                class="text-indigo font-weight-black mr-2 selection-count-number">{{ count($recipients) }}</span>
                            <span
                                class="text-dark font-weight-bold small uppercase letter-spacing-1 selection-count-label">{!! __('messages.selected_employees') !!}</span>
                        </div>
                        @if (count($recipients) > 0)
                            <button type="button" wire:click="$set('recipients', [])"
                                class="btn btn-danger btn-sm rounded-pill w-100 py-1 font-weight-black transition-all-300 shadow-none border-0 btn-clear-selection">
                                <i class="la la-times mr-1"></i> {!! __('messages.clear') !!}
                            </button>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Right Content Area -->
            <div class="col-md-8 d-flex flex-column h-100 bg-white shadow-lg-soft">
                <div class="p-2 flex-grow-1 overflow-auto custom-scrollbar">
                    <!-- Send to All: Premium Switch -->
                    <div class="mb-3 premium-broadcast-box shadow-sm transition-all-300 mt-minus-5">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="icon-orb mr-3 shadow-xs">
                                    <i class="la la-bullhorn text-indigo font-large-1"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 font-weight-black text-dark-blue broadcast-title-premium">
                                        {!! __('messages.sent_to_all_employees') !!}</h6>
                                    <p class="text-muted small mb-0 font-weight-bold broadcast-desc-premium">
                                        {!! __('messages.broadcast_mode_hint') !!}</p>
                                </div>
                            </div>
                            <div
                                class="custom-control custom-checkbox custom-control-indigo custom-control-lg scale-150">
                                <input type="checkbox" wire:model.live="sendToAll" class="custom-control-input"
                                    id="sendToAllSwitch">
                                <label class="custom-control-label cursor-pointer" for="sendToAllSwitch"></label>
                            </div>
                        </div>
                    </div>


                    <!-- Form Fields -->
                    <div class="space-y-4">
                        <!-- Subject -->
                        <div class="form-group-premium focus-within-glow mb-2">
                            <label
                                class="form-label font-weight-black text-indigo mb-1 small text-uppercase letter-spacing-2 premium-label-header">
                                {!! __('messages.subject') !!}
                            </label>
                            <div
                                class="premium-input-wrapper shadow-xs @error('subject') border-danger @enderror position-relative d-flex align-items-center">
                                <input type="text" wire:model="subject"
                                    class="form-control border-0 bg-transparent py-3 font-weight-bold w-100 premium-form-input-lg"
                                    placeholder="{!! __('messages.enter_message_subject') !!}">
                            </div>
                        </div>

                        <!-- Message Body -->
                        <div class="form-group-premium mt-2">
                            <label
                                class="form-label font-weight-black text-indigo mb-1 small text-uppercase letter-spacing-2 premium-label-header">
                                {!! __('messages.message_body') !!}
                            </label>
                            <div
                                class="premium-textarea-wrapper shadow-xs @error('body') border-danger @enderror position-relative d-flex">
                                <textarea wire:model="body" rows="9"
                                    class="form-control border-0 bg-transparent p-3 no-resize font-weight-bold flex-grow-1 premium-textarea-input-lg"
                                    placeholder="{!! __('messages.write_your_message_here') !!}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Footer -->
                <div class="px-3 py-3 bg-white d-flex justify-content-center align-items-center">
                    <button type="submit"
                        class="btn btn-premium-save px-5 shadow-pulse font-weight-black transition-3d-hover uppercase letter-spacing-1">
                        <i class="la la-send mr-2"></i> {!! __('messages.send_message') !!}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
