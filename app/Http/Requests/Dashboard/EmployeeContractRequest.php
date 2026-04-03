<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeContractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'contract_duration' => 'required|string|max:255',
            'contract_start_date' => 'required|date',
            'contract_expiry_date' => 'required|date|after:contract_start_date',
            'monthly_salary' => 'required|numeric|min:0',
        ];
    }
}
