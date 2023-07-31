<?php

namespace App\Http\Requests\frontend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class TransferConfirmRequest extends FormRequest
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
            'to_phone' => 'required|numeric|exists:users,phone',
            'amount' => 'required|integer|min:1000',
            'description' => 'string|nullable'
        ];
    }
    public function messages(){
        return [
            'to_phone.required' => 'Phone Number is required.',
            'to_phone.exists' => 'Phone Number does not exist.',
            'amount.required' => 'Amount is required.',
            'amount.integer' => 'Amount must be number.',
            'amount.min' => 'Amount must be minimum 1000 MMK.',
            'description.string' => 'Description must be string.',
        ];
    }
}
