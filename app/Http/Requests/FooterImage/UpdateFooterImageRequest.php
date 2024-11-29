<?php

namespace App\Http\Requests\FooterImage;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFooterImageRequest extends FormRequest
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
            'title' => ['required',Rule::unique('footer_images','title')->ignore($this->footer_image->id,'id')],
            'body' => ['required'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ];
    }
}
