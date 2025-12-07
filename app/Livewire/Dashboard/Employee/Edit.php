<?php

namespace App\Livewire\Dashboard\Employee;

use App\Models\Department;
use App\Models\Employee;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\DepartmentService;
use App\Services\Dashboard\EmployeeService;
use App\Services\Dashboard\EmployeeStatusService;
use App\Services\Dashboard\GovernorateService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    use WithFileUploads;

    public $currentStep = 1;

    public $first_name_ar, $father_name_ar, $grand_father_name_ar, $family_name_ar;
    public $first_name_en, $father_name_en, $grand_father_name_en, $family_name_en;
    public $governoate_id, $city_id, $address_details;
    public $personal_id, $birthday, $gender, $password, $password_confirm, $mobile_no, $marital_status, $alternative_mobile_no;
    public $email, $bank_name, $iban, $banck_account, $currency;
    public $photo, $new_photo;
    public $title, $basic_salary, $appointment_date, $contact_expire_date, $employment_type, $department_id, $employee_status_id, $supervisor;

    public $governorates, $cities;
    public $employeeStatuses;
    public $departments;
    public $educationItems = [];
    public $employeeEducations = [];
    public $EmployeeID;

    public ?Employee $employee;
    protected EmployeeService $employeeService;
    protected GovernorateService $governorateService;
    protected CityService $cityService;
    protected EmployeeStatusService $employeeStatusService;
    protected DepartmentService $departmentService;

    // boot
    public function boot(EmployeeService $employeeService, GovernorateService $governorateService, CityService $cityService, EmployeeStatusService $employeeStatusService, DepartmentService $departmentService)
    {
        $this->employeeService = $employeeService;
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
        $this->employeeStatusService = $employeeStatusService;
        $this->departmentService = $departmentService;
    }

    // mount
    public function mount($employeeID, $governorates, $cities, $employeeStatuses, $departments)
    {
        $this->employee = $this->employeeService->getOne($employeeID);
        $this->EmployeeID = $employeeID;
        $this->governorates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $this->cities = $this->governorateService->getAllCitiesbyGovernorate($this->employee->governoate_id);

        // basic info
        $this->first_name_ar = $this->employee->getTranslation('first_name', 'ar');
        $this->father_name_ar = $this->employee->getTranslation('father_name', 'ar');
        $this->grand_father_name_ar = $this->employee->getTranslation('grand_father_name', 'ar');
        $this->family_name_ar = $this->employee->getTranslation('family_name', 'ar');

        $this->first_name_en = $this->employee->getTranslation('first_name', 'en');
        $this->father_name_en = $this->employee->getTranslation('father_name', 'en');
        $this->grand_father_name_en = $this->employee->getTranslation('grand_father_name', 'en');
        $this->family_name_en = $this->employee->getTranslation('family_name', 'en');
        $this->personal_id = $this->employee->personal_id;
        $this->birthday = $this->employee->birthday;
        $this->gender = $this->employee->gender;
        $this->mobile_no = $this->employee->mobile_no;
        $this->marital_status = $this->employee->marital_status;
        $this->alternative_mobile_no = $this->employee->alternative_mobile_no;
        $this->email = $this->employee->email;
        $this->governoate_id = $this->employee->governoate_id;
        $this->city_id = $this->employee->city_id;
        $this->address_details = $this->employee->address_details;
        $this->bank_name = $this->employee->bank_name;
        $this->iban = $this->employee->iban;
        $this->banck_account = $this->employee->banck_account;
        $this->currency = $this->employee->currency;
        $this->photo = $this->employee->photo;

        // education
        $this->employeeEducations = $this->employee->employeeEducation;
        foreach ($this->employeeEducations as $key => $educationItem) {
            $this->educationItems[$key]['id'] = $educationItem->id;
            $this->educationItems[$key]['educational_instituation_name'] = $educationItem->educational_instituation_name;
            $this->educationItems[$key]['education_level'] = $educationItem->education_level;
            $this->educationItems[$key]['education_year'] = $educationItem->education_year;
            $this->educationItems[$key]['education_aveage'] = $educationItem->education_aveage;
            $this->educationItems[$key]['certification'] = $educationItem->certification;
            $this->educationItems[$key]['new_certification'] = '';
        }

        // job details
        if ($this->employee->employeeJobDetails) {
            $this->title = $this->employee->employeeJobDetails->title;
            $this->basic_salary = $this->employee->employeeJobDetails->basic_salary;
            $this->appointment_date = $this->employee->employeeJobDetails->appointment_date;
            $this->contact_expire_date = $this->employee->employeeJobDetails->contact_expire_date;
            $this->employment_type = $this->employee->employeeJobDetails->employment_type;
            $this->employee_status_id = $this->employee->employeeJobDetails->employee_status_id;
            $this->department_id = $this->employee->employeeJobDetails->department_id;
            $this->supervisor = $this->employee->employeeJobDetails->supervisor;
        }

        $this->employeeStatuses = $employeeStatuses;
        $this->departments = $departments;
        //  $this->educationItems[] = ['educational_instituation_name' => '', 'education_level' => '', 'education_year' => '', 'education_aveage' => '', 'certification' => ''];
    }

    // submit basic form
    public function submitBasicFrom()
    {
        $data = [
            'first_name_ar' => ['required', 'string', 'min:3'],
            'father_name_ar' => ['required', 'string', 'min:3'],
            'grand_father_name_ar' => ['required', 'string', 'min:3'],
            'family_name_ar' => ['required', 'string', 'min:3'],
            'first_name_en' => ['required', 'string', 'min:3'],
            'father_name_en' => ['required', 'string', 'min:3'],
            'grand_father_name_en' => ['required', 'string', 'min:3'],
            'family_name_en' => ['required', 'string', 'min:3'],
            'password_confirm' => ['same:password'],
            'personal_id' => ['required', 'numeric', 'digits:9', Rule::unique('employees')->ignore($this->employee)],
            'birthday' => ['required', 'date'],
            'gender' => ['required'],
            'governoate_id' => ['required', 'exists:governorates,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'address_details' => ['required', 'string', 'min:5'],
            'marital_status' => ['required'],
            'mobile_no' => ['required', 'string', 'min:5', 'max:10'],
            'alternative_mobile_no' => ['required', 'string', 'min:5', 'max:10'],
            'email' => ['required', 'email', 'string', 'min:5'],
            'bank_name' => ['required', 'string', 'min:3'],
            'iban' => ['required', 'string', 'min:3'],
            'banck_account' => ['required', 'string', 'min:3'],
            'currency' => ['required', 'string', 'min:3'],
            // 'photo' => ['nullable', 'mimes:png,jpg,jpeg,gif'],
        ];

        $this->validate($data);

        $basicData = [
            'first_name' => ['ar' => $this->first_name_ar, 'en' => $this->first_name_en],
            'father_name' => ['ar' => $this->father_name_ar, 'en' => $this->father_name_en],
            'grand_father_name' => ['ar' => $this->grand_father_name_ar, 'en' => $this->grand_father_name_en],
            'family_name' => ['ar' => $this->family_name_ar, 'en' => $this->family_name_en],
            'password' => $this->password,
            'personal_id' => $this->personal_id,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'governoate_id' => $this->governoate_id,
            'city_id' => $this->city_id,
            'address_details' => $this->address_details,
            'marital_status' => $this->marital_status,
            'mobile_no' => $this->mobile_no,
            'alternative_mobile_no' => $this->alternative_mobile_no,
            'email' => $this->email,
            'bank_name' => $this->bank_name,
            'iban' => $this->iban,
            'banck_account' => $this->banck_account,
            'currency' => $this->currency,
            'photo' => $this->new_photo,
        ];

        $employeeUpdated = $this->employeeService->updateEmployee($basicData, $this->EmployeeID);

        if (!$employeeUpdated) {
            flash()->error(message: __('general.update_error_message'));
        } else {
            flash()->success(message: __('general.update_success_message'));
            // $this->resetExcept(['governorates', 'cities', 'employeeStatuses', 'employee','departments']);
        }
    }

    // submit education form
    public function submitEducationForm()
    {
        $data = [
            'educationItems' => ['required', 'array'],
            'educationItems.*.educational_instituation_name' => ['required', 'string', 'min:3', 'max:255'],
            'educationItems.*.education_level' => ['required'],
            'educationItems.*.education_year' => ['required', 'numeric'],
            'educationItems.*.education_aveage' => ['required', 'numeric'],
            //'educationItems.*.certification' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif,svg,webp'],
        ];

        $this->validate($data);

        //education data
        $educationData = [];
        foreach ($this->educationItems as $index => $name) {
            $educationData[] = [
                'id' => $this->educationItems[$index]['id'] ?? 0,
                'educational_instituation_name' => $this->educationItems[$index]['educational_instituation_name'] ?? 0,
                'education_level' => $this->educationItems[$index]['education_level'] ?? 0,
                'education_year' => $this->educationItems[$index]['education_year'] ?? 0,
                'education_aveage' => $this->educationItems[$index]['education_aveage'] ?? 0,
                'certification' => $this->educationItems[$index]['new_certification'] ?? 0,
                'employee_id' => $this->EmployeeID,
            ];
        }

        $educationCreated = $this->employeeService->updateEducation($educationData);

        if ($educationCreated == 'employee_not_found') {
            flash()->error(message: __('employees.update_employee_before'));
        } elseif ($educationCreated == 'add_error') {
            flash()->error(message: __('general.update_error_message'));
        } elseif ($educationCreated == 'add_success') {
            flash()->success(message: __('general.update_success_message'));
        }
    }

    // submit job details form
    public function submitJobDetailsFrom()
    {
        $data = [
            'title' => ['required', 'string', 'min:3'],
            'basic_salary' => ['required', 'numeric'],
            'appointment_date' => ['required', 'date'],
            'contact_expire_date' => ['required', 'date'],
            'employment_type' => ['required'],
            'employee_status_id' => ['required', 'exists:employee_statuses,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'supervisor' => ['required', 'string', 'min:3'],
        ];

        $this->validate($data);

        $jobDetailsData = [
            'title' => $this->title,
            'basic_salary' => $this->basic_salary,
            'appointment_date' => $this->appointment_date,
            'contact_expire_date' => $this->contact_expire_date,
            'employment_type' => $this->employment_type,
            'employee_status_id' => $this->employee_status_id,
            'department_id' => $this->department_id,
            'supervisor' => $this->supervisor,
            'employee_id' => $this->EmployeeID,
        ];

        $jobDetailsCreated = $this->employeeService->updateJobDetails($jobDetailsData);

        if ($jobDetailsCreated == 'employee_not_found') {
            flash()->error(message: __('employees.update_employee_before'));
        } elseif ($jobDetailsCreated == 'update_error') {
            flash()->error(message: __('general.update_error_message'));
        } elseif ($jobDetailsCreated == 'update_success') {
            flash()->success(message: __('general.update_success_message'));
        }
    }

    // basic click
    public function basicClick()
    {
        $this->currentStep = 1;
    }

    // education click
    public function educationClick()
    {
        if ($this->EmployeeID == null) {
            flash()->error(message: __('employees.add_employee_before'));
        } else {
            $this->currentStep = 2;
        }
    }

    // job details click
    public function JobDetailsClick()
    {
        if ($this->EmployeeID == null) {
            flash()->error(message: __('employees.add_employee_before'));
        } else {
            $this->currentStep = 3;
        }
    }

    // add new euduction
    public function addNewEducation()
    {
        $this->educationItems[] = ['id' => 0, 'educational_instituation_name' => '', 'education_level' => '', 'education_year' => '', 'education_aveage' => '', 'certification' => '', 'new_certification' => ''];
    }

    // remove euduction
    public function removeEducation($index, $id)
    {
        if (count($this->educationItems) > 1) {
            unset($this->educationItems[$index]);

            $education = $this->employeeService->deleteEducation($id);
            if (!$education) {
                flash()->error(message: __('general.delete_error_message'));
            }
            flash()->success(message: __('general.delete_success_message'));
        }
    }

    // change governorate
    public function changeGovernorate($id)
    {
        if ($id != 0) {
            $this->cities = [];
            $this->city_id = 0;
            $this->cities = $this->governorateService->getAllCitiesbyGovernorate($id);
        } else {
            $this->city_id = 0;
            $this->cities = [];
        }
    }

    public function render()
    {
        return view('livewire.dashboard.employee.edit');
    }
}
