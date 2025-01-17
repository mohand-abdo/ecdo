<?php

namespace App\Http\Requests\Program;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\String\title;

class StoreProgramRequest extends FormRequest
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
            'title' =>'required|unique:programs,title',
            'body'  => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
