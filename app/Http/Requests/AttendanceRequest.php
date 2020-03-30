<?php

namespace App\Http\Requests;

use App\Models\Attendance;
use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'attendance.*.start_day' => 'distinct'
        ];
    }

    public function attributes()
    {
        return [
            'start_time' => '開始時間',
            'end_time' => '終了時間'
        ];
    }

    public function messages()
    {
        return [
            'end_time.after' => '終了時間は開始時間より後の時間を入力してください'
        ];
    }
}
