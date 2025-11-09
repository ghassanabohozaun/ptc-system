<?php

namespace App\Http\Requests\Dashboard;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryRequest extends FormRequest
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
            'name.*' => ['required', 'string', 'min:5', 'max:100', UniqueTranslationRule::for('countries')->ignore($this->id)],
            'phone_code' => ['required', 'string', 'min:2', 'max:10', Rule::unique('countries', 'phone_code')->ignore($this->id)],
            'flag_code' => ['required', 'string', 'min:2'],
            'status' => ['in:on,off'],
        ];
    }
}
