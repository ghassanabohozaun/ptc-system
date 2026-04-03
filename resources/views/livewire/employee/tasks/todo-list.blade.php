<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('dashboard.tasks') }}</h4>
                <div class="list-wrapper">
                    <ul class="todo-list">
                        @foreach ($tasks as $task)
                            <li class="{{ $task->is_completed ? 'completed' : '' }}" wire:key="task-{{ $task->id }}">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"
                                            wire:click="toggleTask({{ $task->id }})"
                                            {{ $task->is_completed ? 'checked' : '' }}>
                                        {{ $task->title }}
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"
                                    wire:click="deleteTask({{ $task->id }})"></i>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="card-footer bg-white border-top-0">
                <form wire:submit.prevent="addTask">
                    <div class="add-items d-flex mb-0">
                        <input type="text" class="form-control"
                            placeholder="{{ __('What do you need to do today?') }}" wire:model="newTaskTitle">
                        <button class="add btn btn-primary font-weight-bold" id="add-task" type="submit"
                            wire:loading.attr="disabled"><i class="ti-location-arrow"></i></button>
                    </div>
                    @error('newTaskTitle')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </form>
            </div>
        </div>
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
