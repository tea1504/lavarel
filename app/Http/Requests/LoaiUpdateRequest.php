<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiUpdateRequest extends FormRequest
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
            'l_ten' => 'required|min:3|max:50',
            'l_trangthai' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'l_ten.required' => 'Bạn phải nhập tên loại',
            'l_ten.min' => 'Tên loại phải chứ ít nhất 3 ký tự',
            'l_ten.max' => 'Tên loại chỉ chứa tối đa 50 lý tự',
            'l_trangthai.required' => 'Bạn phải nhập trạng thái',
        ];
    }
}
