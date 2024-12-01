<?php

namespace App\Http\Requests\Story;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoryRequest extends FormRequest
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
            'title' =>[ 'required',Rule::unique('stories','title')->ignore($this->story->id,'id')],
            'body' => 'required',
            'section_id' => 'required',
            'image' => 'file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480'
        ];
    }
}
