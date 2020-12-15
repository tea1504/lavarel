<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VanChuyenCreateRequest extends FormRequest
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
            'vc_ten' => 'required|min:3|max:200|unique:cusc_van_chuyen',
            'vc_chiphi' => 'required|digits_between:1,10|min:0',
            'vc_trangthai' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'vc_ten.required' => 'Tên phương thức vận chuyển không được bỏ trống',
            'vc_ten.min' => 'Tên phương thức vận chuyển phải có tối thiểu 3 ký tự',
            'vc_ten.max' => 'Tên phương thức vận chuyển chỉ chứa tối đa 200 ký tự',
            'vc_ten.unique' => 'Đã tồn tại phương thức vận chuyển này',
            'vc_chiphi.required' => 'Chi phí vận chuyển không được bỏ trống',
            'vc_chiphi.digits_between' => 'Chi phí vận chuyển không hợp lệ (Giá trị quá lớn hoặc quá nhỏ)',
            'vc_chiphi.min' => 'Chi phí vận chuyển không được phép âm',
            'vc_trangthai.required' => 'Trạng thái chưa được chọn',
        ];
    }
}
