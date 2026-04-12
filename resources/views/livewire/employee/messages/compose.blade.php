<form wire:submit.prevent="sendMessage" class="p-4 bg-light-subtle rounded-bottom-4">
    <!-- Recipient -->
    <div class="mb-4">
        <label class="form-label fw-bold small text-uppercase text-muted mb-2">
            {!! __('messages.recipients') !!} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-merge">
            <span class="input-group-text">
                <i class="mdi mdi-account-star-outline text-primary fs-5"></i>
            </span>
            <select wire:model="recipient" class="form-select">
                <option value="">{!! __('messages.select_admin') !!}</option>
                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}">
                        {{ $admin->name }} ({{ $admin->email }})
                    </option>
                @endforeach
            </select>
        </div>
        @error('recipient')
            <div class="text-danger small mt-2 fw-semibold">{{ $message }}</div>
        @enderror
    </div>

    <!-- Subject -->
    <div class="mb-4">
        <label class="form-label fw-bold small text-uppercase text-muted mb-2">
            {!! __('messages.subject') !!} <span class="text-danger">*</span>
        </label>
        <div class="input-group input-group-merge">
            <span class="input-group-text">
                <i class="mdi mdi-tag-outline text-primary fs-5"></i>
            </span>
            <input type="text" wire:model="subject" class="form-control"
                placeholder="{!! __('messages.what_is_this_about') !!}">
        </div>
        @error('subject')
            <div class="text-danger small mt-2 fw-semibold">{{ $message }}</div>
        @enderror
    </div>

    <!-- Body -->
    <div class="mb-4">
        <label class="form-label fw-bold small text-uppercase text-muted mb-2">
            {!! __('messages.message') !!} <span class="text-danger">*</span>
        </label>
        <textarea wire:model="body" rows="6" class="form-control shadow-sm border-0 rounded-4" 
            style="padding: 15px; background: white;"
            placeholder="{!! __('messages.type_your_message_here') !!}"></textarea>
        @error('body')
            <div class="text-danger small mt-2 fw-semibold">{{ $message }}</div>
        @enderror
    </div>

    <!-- Actions -->
    <div class="d-flex align-items-center justify-content-end gap-3 pt-3 border-top mt-4">
        <button type="button" class="btn btn-light px-4 py-2 fw-semibold text-muted" data-bs-dismiss="modal" style="border-radius: 12px;">
            {!! __('messages.cancel') !!}
        </button>
        <button type="submit" class="btn btn-primary px-4 py-2 text-white fw-bold btn-premium-send">
            <i class="mdi mdi-send me-1"></i> {!! __('messages.send_message') !!}
        </button>
    </div>
</form>
