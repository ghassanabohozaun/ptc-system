<?php

namespace App\Repositories\Employees;

use App\Models\EmployeeTask;

class EmployeeTaskRepository
{
    public function getOne($id)
    {
        return EmployeeTask::find($id);
    }

    public function getAllForEmployee($employeeId)
    {
        return EmployeeTask::where('employee_id', $employeeId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function create(array $data)
    {
        return EmployeeTask::create($data);
    }

    public function update($task_instance, array $data)
    {
        return $task_instance->update($data);
    }

    public function destroy($task_instance)
    {
        return $task_instance->delete();
    }

    public function toggleStatus($task_instance)
    {
        $task_instance->is_completed = !$task_instance->is_completed;
        return $task_instance->save();
    }
}
