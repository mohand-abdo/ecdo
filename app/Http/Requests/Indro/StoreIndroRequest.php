<?php

namespace App\Http\Requests\Indro;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndroRequest extends FormRequest
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
            'title' => ['required'],
            'body' => ['required'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ];
    }
}
