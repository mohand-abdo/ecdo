<?php

namespace App\Http\Requests\Humanitarian;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHumanitarianRequest extends FormRequest
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
            'title' => ['required',Rule::unique('stories','title')->ignore($this->humanitarian->id,'id')],
            'body' => 'required',
            'section_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp'
        ];
    }
}
