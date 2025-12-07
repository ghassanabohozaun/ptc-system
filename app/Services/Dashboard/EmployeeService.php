<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\EmployeeRepository;
use App\Utils\ImageManagerUtils;
use Yajra\DataTables\Facades\DataTables;

class EmployeeService
{
    protected $employeeRepository, $imageManagerUtils;

    // _construct
    public function __construct(EmployeeRepository $employeeRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->employeeRepository = $employeeRepository;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    // get one
    public function getOne($id)
    {
        $employee = $this->employeeRepository->getOne($id);
        if (!$employee) {
            return false;
        }
        return $employee;
    }

    // get all
    public function getAll($request)
    {

        $employees = $this->employeeRepository->getAll($request);
        return DataTables::of($employees)
            ->addIndexColumn()
            ->addColumn('full_name', function ($employee) {
                return $employee->EmployeeFullName();
            })
            ->addColumn('gender', function ($employee) {
                return $employee->EmployeeGender();
            })
            ->addColumn('created_at', function ($employee) {
                return $employee->created_at;
            })
            ->addColumn('actions', function ($employee) {
                return view('dashboard.employees.employees.parts.actions', compact('employee'));
            })
            ->make(true);
    }

    // get employees
    public function getEmployees()
    {
        return $this->employeeRepository->getEmployees();
    }

    // get active employees
    public function getActive()
    {
        return $this->employeeRepository->getActive();
    }


    // store employee
    public function storeEmployee($data)
    {
        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $data['photo'] = $this->imageManagerUtils->saveResizeImage($data['photo'], 'employeesPhotos', 600, 600);
        }

        $employee = $this->employeeRepository->storeEmployee($data);
        if (!$employee) {
            return false;
        }
        return $employee;
    }

    // update employee
    public function updateEmployee($data, $employeeID)
    {
        $employee = self::getOne($employeeID);
        if (!$employee) {
            return false;
        }

        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $this->imageManagerUtils->removeImageFromLocal($employee->photo, 'employeesPhotos');
            $data['photo'] = $this->imageManagerUtils->saveResizeImage($data['photo'], 'employeesPhotos', 1700, 1000);
        } else {
            if ($employee->photo != null) {
                $data['photo'] = $employee->photo;
            } else {
                $data['photo'] = '';
            }
        }

        $employee = $this->employeeRepository->updateEmployee($employee, $data);
        if (!$employee) {
            return false;
        }
        return $employee;
    }

    // destroy
    public function destroy($id)
    {
        $employee = self::getOne($id);
        if (!$employee) {
            return false;
        }

        if (!empty($employee->photo)) {
            $this->imageManagerUtils->removeImageFromLocal($employee->photo, 'employeesPhotos');
        }

        $employee = $this->employeeRepository->destroy($employee);
        if (!$employee) {
            return false;
        }
        return $employee;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $employee = self::getOne($id);
        if (!$employee) {
            return false;
        }

        $employee = $this->employeeRepository->changeStatus($employee, $status);
        if (!$employee) {
            return false;
        }
        return $employee;
    }

     // autocomplete employee
    public function autocompleteEmployee($searchValue)
    {
        return $this->employeeRepository->autocompleteEmployee($searchValue);
    }

    //////////////////////////////////////////////////////////////////////////////////////////
    // Education

    // store education
    public function storeEducation($data)
    {
        $employee = self::getOne($data[0]['employee_id']);

        if (!$employee) {
            return 'employee_not_found';
        }

        $employeeEducations = $this->employeeRepository->getAllEmployeeEducations($employee);

        if (!$employeeEducations->isEmpty()) {
            foreach ($employeeEducations as $education) {
                $this->imageManagerUtils->removeImageFromLocal($education->certification, 'employeesCertifications');
            }
            $this->employeeRepository->deleteAllEmloyeeEducations($employee);
        }

        foreach ($data as $item) {
            if (array_key_exists('certification', $item) && $item['certification'] != null) {
                $item['certification'] = $this->imageManagerUtils->saveResizeImage($item['certification'], 'employeesCertifications', 1700, 1000);
            }
            $education = $this->employeeRepository->storeEducation($item);
            if (!$education) {
                return 'add_error';
            }
        }

        return 'add_success';
    }

    // update education

    public function updateEducation($data)
    {
        $employee = self::getOne($data[0]['employee_id']);

        if (!$employee) {
            return 'employee_not_found';
        }

        foreach ($data as $educationItem) {
            if ($educationItem['id'] != 0) {
                // update
                $education = $this->employeeRepository->getOneEducation($educationItem['id']);

                // update certiciation
                if (array_key_exists('certification', $educationItem) && $educationItem['certification'] != null) {
                    $this->imageManagerUtils->removeImageFromLocal($education->certification, 'employeesCertifications');
                    $educationItem['certification'] = $this->imageManagerUtils->saveResizeImage($educationItem['certification'], 'employeesCertifications', 1700, 1000);
                } else {
                    if ($education->certification != null) {
                        $educationItem['certification'] = $education->certification;
                    } else {
                        $educationItem['certification'] = '';
                    }
                }
                // update education
                $this->employeeRepository->updateEducation($education, $educationItem);
            } else {
                /// inset new education
                if (array_key_exists('certification', $educationItem) && $educationItem['certification'] != null) {
                    $educationItem['certification'] = $this->imageManagerUtils->saveResizeImage($educationItem['certification'], 'employeesCertifications', 1700, 1000);
                }
                $this->employeeRepository->storeEducation($educationItem);
            }
        }

        return 'add_success';
    }

    // delete eduction
    public function deleteEducation($id)
    {
        $education = $this->employeeRepository->getOneEducation($id);
        if (!$education) {
            return false;
        }

        if (!empty($education->certification)) {
            $this->imageManagerUtils->removeImageFromLocal($education->certification, 'employeesCertifications');
         }

        $education = $this->employeeRepository->deleteOneEducation($education);
        if (!$education) {
            return false;
        }

        return true;
    }
    //////////////////////////////////////////////////////////////////////////////////////////
    // Job Details

    // store job details
    public function storeJobDetails($data)
    {
        $employee = self::getOne($data['employee_id']);

        if (!$employee) {
            return 'employee_not_found';
        }

        $jobDetails = $this->employeeRepository->getOneEmployeeJobDetails($data['employee_id']);

        // delete old
        if ($jobDetails) {
            $this->employeeRepository->destoryJobDetails($jobDetails);
        }

        // store
        $jobDetails = $this->employeeRepository->storeJobDetails($data);

        if (!$jobDetails) {
            return 'add_error';
        }

        return 'add_success';
    }

    // update job details
    public function updateJobDetails($data)
    {
        $employee = self::getOne($data['employee_id']);

        if (!$employee) {
            return 'employee_not_found';
        }

        $jobDetails = $this->employeeRepository->getOneEmployeeJobDetails($data['employee_id']);

        // delete old
        if ($jobDetails) {
            $this->employeeRepository->destoryJobDetails($jobDetails);
        }

        // store
        $jobDetails = $this->employeeRepository->storeJobDetails($data);

        if (!$jobDetails) {
            return 'update_error';
        }

        return 'update_success';
    }
}
