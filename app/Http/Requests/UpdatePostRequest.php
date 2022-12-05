<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|unique:posts,title,".$this->post->id.",id|regex:/^[a-z]*$/i",
            "image" => "nullable|file|mimes:png,jpg,webp|max:2048",
            "content" => "required|min:20",
        ];
    }
}
