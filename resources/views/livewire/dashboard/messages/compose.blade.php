<form wire:submit.prevent="sendMessage" class="p-4">
    <!-- Send to All Checkbox -->
    <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" wire:model.live="sendToAll" id="sendToAll" class="form-check-input"
                style="width: 18px; height: 18px;">
            <label for="sendToAll" class="form-check-label font-weight-bold text-dark"
                style="margin:4px 10px; cursor: pointer;">
                {!! __('messages.sent_to_all_employees') !!}
            </label>
        </div>
    </div>

    <!-- Recipients -->
    @if (!$sendToAll)
        <div class="mb-2">
            <label class="form-label font-weight-bold text-dark">
                {!! __('messages.recipients') !!} <span class="text-danger">*</span>
            </label>

            <div class="card border-light shadow-sm mb-0">
                <div class="card-header bg-white p-2 border-bottom-0">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text  border-0">
                                <i class="la la-search  small"></i>
                            </span>
                        </div>
                        <input type="text" wire:model.live="search" class="form-control border-0 small"
                            placeholder="{!! __('messages.search_by_name_or_email') !!}">
                    </div>
                </div>
                <div class="card-body p-0 border-top border-light" style="max-height: 150px; overflow-y: auto;">
                    <ul class="list-group list-group-flush ">
                        @forelse($employees as $employee)
                            <li class="list-group-item list-group-item-action border-0 py-2">
                                <div class="custom-control custom-checkbox px-4">
                                    <input class="custom-control-input" type="checkbox" wire:model.live="recipients"
                                        value="{{ $employee->id }}" id="emp_{{ $employee->id }}">
                                    <label
                                        class="custom-control-label w-100 cursor-pointer d-flex justify-content-between align-items-center"
                                        for="emp_{{ $employee->id }}">
                                        <span class="text-dark font-weight-600">
                                            {{ $employee->first_name }} {{ $employee->family_name }}
                                        </span>
                                        <span class="text-muted ">{{ $employee->email }}</span>
                                    </label>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted py-4 border-0">
                                <i class="fas fa-user-slash fa-2x mb-2 opacity-25"></i>
                                <p class="mb-0">{!! __('messages.no_employees_found') !!}</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer py-2 px-3 border-top-0 d-flex justify-content-between align-items-center">
                    <span class="text-muted small">{!! __('messages.selected') !!} : <span
                            class="text-primary font-weight-bold">{{ count($recipients) }}</span></span>
                    @if (count($recipients) > 0)
                        <button type="button" wire:click="$set('recipients', [])"
                            class="btn btn-link btn-sm text-danger p-0" style="font-size: 11px;">{!! __('messages.clear_all') !!}
                        </button>
                    @endif
                </div>
            </div>

            @error('recipients')
                <div class="text-danger small mt-2"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</div>
            @enderror
        </div>
    @endif

    <!-- Subject -->
    <div class="mb-2">
        <label class="form-label font-weight-bold text-dark mb-1">
            {!! __('messages.subject') !!} <span class="text-danger">*</span>
        </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text border-right-0"><i class="la la-tag text-muted small"></i></span>
            </div>
            <input type="text" wire:model="subject" class="form-control border-left-0"
                placeholder="{!! __('messages.what_is_this_about') !!}">
        </div>
        @error('subject')
            <div class="text-danger small mt-2"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</div>
        @enderror
    </div>

    <!-- Body -->
    <div class="mb-2">
        <label class="form-label font-weight-bold text-dark mb-1">
            {!! __('messages.message') !!} <span class="text-danger">*</span>
        </label>
        <textarea wire:model="body" rows="6" class="form-control" placeholder="{!! __('messages.type_your_message_here') !!}"></textarea>
        @error('body')
            <div class="text-danger small mt-1"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</div>
        @enderror
    </div>

    <!-- Actions -->
    <div class="d-flex align-items-center justify-content-between pt-1  ">
        <button type="button" class="btn btn-light px-4" data-dismiss="modal">
            {!! __('messages.cancel') !!}
        </button>
        <button type="submit" class="btn btn-primary px-4 font-weight-bold msg-sidebar-btn">
            <i class="fas fa-paper-plane mr-2"></i> {!! __('messages.send_message') !!}
        </button>
    </div>
</form>
