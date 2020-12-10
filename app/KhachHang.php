<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    const CREATED_AT = 'kh_taomoi';
    const UPDATED_AT = 'kh_capnhat';

    protected $table = 'cusc_khach_hang';
    protected $fillable     = ['kh_taikhoan', 'kh_matkhau', 'kh_hoten', 'kh_gioitinh', 'kh_email', 'kh_ngaysinh', 'kh_diachi', 'kh_dienthoai', 'kh_taomoi', 'kh_capnhat', 'kh_trangthai'];
    protected $guarded      = ['kh_ma'];

    protected $primaryKey   = 'kh_ma';

    protected $dates        = ['kh_taomoi', 'kh_capnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachGopY(){
        return $this->hasMany('App\GopY','kh_ma','kh_ma');
    }
    public function danhSachDonHang(){
        return $this->hasMany('App\DonHang','kh_ma','kh_ma');
    }
}
