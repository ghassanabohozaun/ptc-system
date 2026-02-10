<form wire:submit.prevent="sendMessage" class="p-4">
    <!-- Recipient -->
    <div class="mb-4">
        <label class="form-label fw-bold mb-2">
            {!! __('messages.recipients') !!} <span class="text-danger">*</span>
        </label>
        <div class="input-group shadow-xs">
            <span class="input-group-text  border-end-0" style="font-size: 15px">
                <i class="mdi mdi-account-star text-muted"></i>
            </span>
            <select wire:model="recipient" class="form-select border-start-0"
                style="color: rgb(29, 28, 28) ;font-size: 13px">
                <option value="">{!! __('messages.select_admin') !!}</option>
                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}">
                        {{ $admin->name }} ({{ $admin->email }})
                    </option>
                @endforeach
            </select>
        </div>
        @error('recipient')
            <div class="text-danger small mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Subject -->
    <div class="mb-4">
        <label class="form-label fw-bold text-dark mb-2">
            {!! __('messages.subject') !!} <span class="text-danger">*</span>
        </label>
        <div class="input-group shadow-xs">
            <span class="input-group-text border-end-0">
                <i class="mdi mdi-tag-outline text-muted"></i>
            </span>
            <input type="text" wire:model="subject" class="form-control {!! Lang() == 'en' ? 'border-start-0' : 'border-end-0' !!} ps-0"
                placeholder=" {!! __('messages.what_is_this_about') !!}">
        </div>
        @error('subject')
            <div class="text-danger small mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Body -->
    <div class="mb-4">
        <label class="form-label fw-bold text-dark mb-2">
            {!! __('messages.message') !!} <span class="text-danger">*</span>
        </label>
        <textarea wire:model="body" rows="8" class="form-control shadow-xs" placeholder=" {!! __('messages.type_your_message_here') !!}"></textarea>
        @error('body')
            <div class="text-danger small mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Actions -->
    <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4">
        <button type="button" class="btn btn-outline-dark px-4 py-2" data-bs-dismiss="modal">
            {!! __('messages.cancel') !!}
        </button>
        <button type="submit" class="btn btn-primary px-4 py-2 text-white fw-bold msg-sidebar-btn">
            <i class="mdi mdi-send me-1"></i> {!! __('messages.send_message') !!}
        </button>
    </div>
</form>
