<?php

namespace App\Http\Requests\Dashboard;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'name.*' => ['required', 'string', 'max:50', 'min : 2'],
            'email' => ['required', 'email', 'max:120', Rule::unique('admins', 'email')->ignore($this->id)],
            'role_id' => ['required', 'exists:admins,id'],
            'password' => ['required_without:id'],
            'password_confirm' => ['required_without:id', 'same:password'],
            'status' => ['required', 'in:1,0'],
        ];
    }
}
