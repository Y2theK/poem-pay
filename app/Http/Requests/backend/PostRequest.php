<?php

namespace App\Http\Requests\backend;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

    public function prepareForValidation(){
        $this->merge([
            'slug' => Str::slug($this->title) . '-' . uniqid(),
            'user_id' => $this->user_id ?? 0
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'   => 'required|string|max:255',
            'slug'    => 'required|string|unique:posts,slug',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'user_id' => 'required'
        ];
    }
}
