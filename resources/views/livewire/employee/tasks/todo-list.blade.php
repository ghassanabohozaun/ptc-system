<div class="p-4">
    <h4 class="card-title fw-bold mb-3">
        <i class="mdi mdi-checkbox-marked-circle-outline me-1 text-primary"></i>
        {{ __('dashboard.tasks') }}
    </h4>
    <div class="list-wrapper">
        <ul class="todo-list">
            @foreach ($tasks as $task)
                <li class="{{ $task->is_completed ? 'completed' : '' }} border-bottom py-2" wire:key="task-{{ $task->id }}">
                    <div class="form-check">
                        <label class="form-check-label fw-medium">
                            <input class="checkbox" type="checkbox"
                                wire:click="toggleTask({{ $task->id }})"
                                {{ $task->is_completed ? 'checked' : '' }}>
                            {{ $task->title }}
                            <i class="input-helper"></i>
                        </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline text-muted"
                        wire:click="deleteTask({{ $task->id }})" style="cursor: pointer;"></i>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        <form wire:submit.prevent="addTask">
            <div class="add-items d-flex mb-0 gap-2">
                <input type="text" class="form-control rounded-pill px-3"
                    placeholder="{{ __('dashboard.what_do_you_need_to_do_today') }}" wire:model="newTaskTitle">
                <button class="btn btn-primary btn-icon rounded-circle shadow-sm" id="add-task" type="submit"
                    wire:loading.attr="disabled">
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
            @error('newTaskTitle')
                <span class="text-danger small ms-2">{{ $message }}</span>
            @enderror
        </form>
    </div>
</div>


@push('style')
    <style>
        /* Ensure the todo list styles are applied if the main CSS is missing them */
        .todo-list-input {
            flex-grow: 1;
            margin-right: 1.125rem;
        }

        .list-wrapper {
            max-height: 450px;
            overflow-y: auto;
        }

        .todo-list li .form-check {
            margin-top: 0;
            margin-bottom: 0;
        }

        /* Star Admin 2 Pro specific overrides if needed */
        .todo-list li.completed label {
            text-decoration: line-through;
            color: #9c9fa6;
        }
    </style>
@endpush
