<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class ExchangeConfigRequest extends FormRequest
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
            'reaction_rate' => 'required|numeric',
            'comment_rate' => 'required|numeric',
            'share_rate' => 'required|numeric',
            'time' => 'required|numeric',
            'time_type' => 'required|in:day,week,month,year',
        ];
    }
}
