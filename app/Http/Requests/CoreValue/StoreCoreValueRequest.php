<?php

namespace App\Http\Requests\CoreValue;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoreValueRequest extends FormRequest
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
            'title' => 'required|unique:core_values,title',
            'icon'  => 'required'
        ];
    }
}
