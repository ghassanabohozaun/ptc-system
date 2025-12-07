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

class Create extends Component
{
    use WithFileUploads;

    public $currentStep = 1;

    public $first_name_ar, $father_name_ar, $grand_father_name_ar, $family_name_ar;
    public $first_name_en, $father_name_en, $grand_father_name_en, $family_name_en;
    public $governoate_id, $city_id, $address_details;
    public $personal_id, $birthday, $gender, $password, $password_confirm, $mobile_no, $marital_status, $alternative_mobile_no;
    public $email, $photo, $bank_name, $iban, $banck_account, $currency;
    public $title, $basic_salary, $appointment_date, $contact_expire_date, $employment_type, $department_id, $employee_status_id, $supervisor;
    public $employeeCreatedCheck;

    public $governorates, $cities;
    public $employeeStatuses;
    public $departments;
    public $educationItems = [];

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
    public function mount($governorates, $cities, $employeeStatuses, $departments)
    {
        $this->employee = new Employee();
        $this->governorates = $governorates;
        $this->cities = $cities;
        $this->governoate_id ?? ($this->cities = []);
        $this->employeeStatuses = $employeeStatuses;
        $this->departments = $departments;
        $this->educationItems[] = ['educational_instituation_name' => '', 'education_level' => '', 'education_year' => '', 'education_aveage' => '', 'certification' => ''];
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
            'password' => ['required:id'],
            'password_confirm' => ['required:id', 'same:password'],
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
            'photo' => ['nullable', 'mimes:png,jpg,jpeg,gif'],
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
            'photo' => $this->photo ?? null,
        ];

        $employeeCreated = $this->employeeService->storeEmployee($basicData);

        $this->employeeCreatedCheck = $employeeCreated->id;

        if (!$employeeCreated) {
            flash()->error(message: __('general.add_error_message'));
        } else {
            flash()->success(message: __('general.add_success_message'));
           // $this->resetExcept(['governorates', 'cities', 'employeeStatuses', 'employee', 'employeeCreatedCheck','departments']);
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
            'educationItems.*.certification' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif,svg,webp'],
        ];

        $this->validate($data);

        //education data
        $educationData = [];
        foreach ($this->educationItems as $index => $name) {
            $educationData[] = [
                'employee_id' => $this->employeeCreatedCheck,
                'educational_instituation_name' => $this->educationItems[$index]['educational_instituation_name'] ?? 0,
                'education_level' => $this->educationItems[$index]['education_level'] ?? 0,
                'education_year' => $this->educationItems[$index]['education_year'] ?? 0,
                'education_aveage' => $this->educationItems[$index]['education_aveage'] ?? 0,
                'certification' => $this->educationItems[$index]['certification'] ?? 0,
            ];
        }

        $educationCreated = $this->employeeService->storeEducation($educationData);

        if ($educationCreated == 'employee_not_found') {
            flash()->error(message: __('employees.add_employee_before'));
        } elseif ($educationCreated == 'add_error') {
            flash()->error(message: __('general.add_error_message'));
        } elseif ($educationCreated == 'add_success') {
            flash()->success(message: __('general.add_success_message'));
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
            'employee_id' => $this->employeeCreatedCheck,
        ];

        $jobDetailsCreated = $this->employeeService->storeJobDetails($jobDetailsData);

        if ($jobDetailsCreated == 'employee_not_found') {
            flash()->error(message: __('employees.add_employee_before'));
        } elseif ($jobDetailsCreated == 'add_error') {
            flash()->error(message: __('general.add_error_message'));
        } elseif ($jobDetailsCreated == 'add_success') {
            flash()->success(message: __('general.add_success_message'));
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
        if ($this->employeeCreatedCheck == null) {
            flash()->error(message: __('employees.add_employee_before'));
        } else {
            $this->currentStep = 2;
        }
    }

    // job details click
    public function JobDetailsClick()
    {
        if ($this->employeeCreatedCheck == null) {
            flash()->error(message: __('employees.add_employee_before'));
        } else {
            $this->currentStep = 3;
        }
    }

    // add new euduction
    public function addNewEducation()
    {
        $this->educationItems[] = ['educational_instituation_name' => '', 'education_level' => '', 'education_year' => '', 'education_aveage' => '', 'certification' => ''];
    }

    // remove euduction
    public function removeEducation($index)
    {
        if (count($this->educationItems) > 1) {
            unset($this->educationItems[$index]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.employee.create', [
            'governorates' => $this->governorates,
            'cities' => $this->cities,
            'employeeStatuses' => $this->employeeStatuses,
        ]);
    }
}
