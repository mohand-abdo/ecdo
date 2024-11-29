<?php

namespace App\Http\Requests\SaveLive;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSaveLiveRequest extends FormRequest
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
            'title' => ['required' , Rule::unique('save_lives','title')->ignore($this->save_live->id,'id')],
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp'
        ];
    }
}
