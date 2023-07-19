<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
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
        $id = $this->route('staff');
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:admin_users,email,'.$id,
            'phone' => 'required|numeric|unique:admin_users,phone,'.$id,
            'password' => 'min:8|max:10|nullable'
        ];
    }
}
