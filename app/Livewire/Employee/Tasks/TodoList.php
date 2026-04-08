<?php

namespace App\Livewire\Employee\Tasks;

use App\Services\Employees\EmployeeTaskService;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TodoList extends Component
{
    public $newTaskTitle = '';

    protected $taskService;

    public function boot(EmployeeTaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function addTask()
    {
        $employeeId = Auth::guard('employee')->id();

        if (!$employeeId) {
            flash()->error(__('You must be logged in as an employee.'));
            return;
        }

        $this->validate([
            'newTaskTitle' => 'required|min:3|max:255',
        ]);

        $this->taskService->createTask([
            'employee_id' => $employeeId,
            'title' => $this->newTaskTitle,
            'is_completed' => false,
        ]);

        $this->newTaskTitle = '';
        flash()->success(__('general.add_success_message'));
    }

    public function toggleTask($taskId)
    {
        $this->taskService->toggleTaskStatus($taskId);
    }

    public function deleteTask($taskId)
    {
        $this->taskService->deleteTask($taskId);
        flash()->success(__('general.delete_success_message'));
    }

    public function render()
    {
        $tasks = $this->taskService->getTasksForEmployee(Auth::guard('employee')->id());

        return view('livewire.employee.tasks.todo-list', [
            'tasks' => $tasks
        ]);
    }
}
