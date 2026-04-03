<?php

namespace App\Services\Employees;

use App\Repositories\Employees\EmployeeTaskRepository;

class EmployeeTaskService
{
    protected $taskRepository;

    public function __construct(EmployeeTaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getTasksForEmployee($employeeId)
    {
        return $this->taskRepository->getAllForEmployee($employeeId);
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask($id, array $data)
    {
        $task = $this->taskRepository->getOne($id);
        if ($task) {
            return $this->taskRepository->update($task, $data);
        }
        return false;
    }

    public function deleteTask($id)
    {
        $task = $this->taskRepository->getOne($id);
        if ($task) {
            return $this->taskRepository->destroy($task);
        }
        return false;
    }

    public function toggleTaskStatus($id)
    {
        $task = $this->taskRepository->getOne($id);
        if ($task) {
            return $this->taskRepository->toggleStatus($task);
        }
        return false;
    }
}
