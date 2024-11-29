<?php

namespace App\Http\Requests\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['string','required'],
            'email' => ['required','email',Rule::unique('users','email')->ignore($this->user->id,'id')],
            'image' => ['image','mimes:png,jpg,jpeg'],
            'password' => ['nullable','string','min:8'],

        ];
    }
}
