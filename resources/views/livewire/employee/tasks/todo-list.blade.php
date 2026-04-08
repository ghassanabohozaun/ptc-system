<div class="card tasks-card border-0 shadow-sm">
    <div class="card-body p-4">
        <h4 class="card-title fw-bold mb-4 d-flex align-items-center tasks-title-text">
            <div class="tasks-icon-box me-3 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-clipboard-text-outline fs-4"></i>
            </div>
            {{ __('dashboard.tasks') }}
        </h4>

        <div class="list-wrapper tasks-list-wrapper custom-scrollbar">
            <ul class="tasks-items-list list-unstyled m-0 p-0">
                @foreach ($tasks as $task)
                    <li class="{{ $task->is_completed ? 'completed' : '' }} mb-2 transition-all task-item" 
                        wire:key="task-{{ $task->id }}">
                        <div class="d-flex align-items-center p-2 px-3 w-100 justify-content-between">
                            <div class="form-check m-0 d-flex align-items-center flex-grow-1">
                                <label class="form-check-label fw-medium d-flex align-items-center mb-0 w-100" style="cursor: pointer;">
                                    <input class="checkbox task-checkbox me-3" type="checkbox"
                                        wire:click="toggleTask({{ $task->id }})"
                                        {{ $task->is_completed ? 'checked' : '' }}>
                                    <span class="task-text-display">
                                        {{ $task->title }}
                                    </span>
                                </label>
                            </div>
                            <div class="actions">
                                <button class="btn btn-link p-2 border-0 text-muted hover-danger transition-all delete-task-btn d-flex align-items-center" 
                                        wire:click="deleteTask({{ $task->id }})" 
                                        title="{{ __('general.delete') }}">
                                    <i class="mdi mdi-trash-can-outline fs-5"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                @endforeach
                @if($tasks->isEmpty())
                    <div class="text-center py-5">
                        <i class="mdi mdi-checkbox-multiple-marked-outline text-silver d-block mb-3" style="font-size: 3rem; opacity: 0.2;"></i>
                        <p class="text-muted small">{{ __('dashboard.no_tasks_found') }}</p>
                    </div>
                @endif
            </ul>
        </div>

        <div class="mt-4 pt-3 border-top">
            <form wire:submit.prevent="addTask">
                <div class="add-items d-flex align-items-center gap-2">
                    <div class="input-group-premium flex-grow-1">
                        <input type="text" class="form-control premium-add-input shadow-none"
                            placeholder="{{ __('dashboard.what_do_you_need_to_do_today') }}" 
                            wire:model="newTaskTitle">
                    </div>
                    <button class="btn btn-premium-add shadow-sm d-flex align-items-center justify-content-center transition-all" 
                            id="add-task" type="submit"
                            wire:loading.attr="disabled">
                        <i class="mdi mdi-plus fs-5" wire:loading.remove></i>
                        <span class="spinner-border spinner-border-sm" wire:loading></span>
                    </button>
                </div>
                @error('newTaskTitle')
                    <span class="text-danger small ms-2 mt-2 d-inline-block">{{ $message }}</span>
                @enderror
            </form>
        </div>
    </div>
</div>

