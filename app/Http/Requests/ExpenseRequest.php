<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'user_id' => 'required',
            'date' => 'required|date',
            'cost_id' => 'required|integer',
            'fee' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [
            'date' => '使用日',
            'cost_id' => '経費の種類',
            'fee' => '金額'
        ];
    }
}
