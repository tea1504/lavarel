<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamUpdateRequest extends FormRequest
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
            'sp_ten' => 'required|min:3|max:200',
            'sp_giaGoc' => 'required',
            'sp_giaBan' => 'required',
            'sp_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'sp_thongTin' => 'required',
            'sp_danhGia' => 'required|max:50',
            'l_ma' => 'required|',
        ];
    }

    public function messages(){
        return[
            'sp_ten.required' => 'Tên sản phẩm không được bỏ trống',
            'sp_ten.min' => 'Tên sản phẩm phải chứ tối thiểu 3 ký tự',
            'sp_ten.max' => 'Tên sản phẩm chỉ chứ tối đa 200 ký tự',
            'sp_giaGoc.required' => 'Giá gốc sản phẩm không được bỏ trống',
            'sp_giaBan.required' => 'Giá bán sản phẩm không được bỏ trống',
            'sp_hinh.file' => 'Hình sản phẩm phải là file',
            'sp_hinh.image' => 'Hình sản phẩm phải là file ảnh',
            'sp_hinh.mimes' => 'File hình ảnh phải là một trong các định dạng jpeg,png,gif,webp',
            'sp_hinh.max' => 'File hình ảnh không được quá 2MB',
            'sp_thongTin.required' => 'Thông tin sản phẩm không được bỏ trống',
            'sp_danhGia.required' => 'Đánh giá sản phẩm không được bỏ trống',
            'sp_danhGia.max' => 'Đánh giá sản phẩm chỉ chứa tối đa 50 ký tự',
            'l_ma.required' => 'Loại sản phẩm không được bỏ trống',
        ];
    }
}
