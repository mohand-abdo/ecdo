<?php

namespace App\Http\Requests\HumanitarianStrtegy;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHumanitarianStrtegyRequest extends FormRequest
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
            'title' => ['required',Rule::unique('humanitarian_strtegies','title')->ignore($this->humanitarian_strtegy->id,'id')],
            'icon'  =>  'required'

        ];
    }
}
