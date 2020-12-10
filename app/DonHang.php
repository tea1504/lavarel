<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    const     CREATED_AT    = 'dh_taoMoi';
    const     UPDATED_AT    = 'dh_capNhat';

    protected $table        = 'cusc_don_hang';
    protected $fillable     = ['kh_ma', 'dh_thoigiandathang', 'dh_thoigiannhanhang', 'dh_nguoinhan', 'dh_diachi', 'dh_dienthoai', 'dh_nguoigui', 'dh_loichuc', 'dh_thanhtoan', 'nv_xuly', 'dh_ngayxuly', 'nv_giaohang', 'dh_ngaylapphieugiao', 'dh_ngaygiaohang', 'dh_taoMoi', 'dh_capNhat', 'dh_trangThai', 'vc_ma', 'tt_ma'];
    protected $guarded      = ['dh_ma'];

    protected $primaryKey   = 'dh_ma';

    protected $dates        = ['dh_thoigiandathang', 'dh_thoigiannhanhang', 'dh_ngayxuly', 'dh_ngaylapphieugiao', 'dh_ngaygiaohang', 'dh_taoMoi', 'dh_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachChiTietDonHang()
    {
        return $this->hasMany('App\ChiTietDonHang','dh_ma','dh_ma');
    }
    public function danhSachHoaDonSi()
    {
        return $this->hasMany('App\HoaDonSi','dh_ma','dh_ma');
    }
    public function danhSachHoaDonLe()
    {
        return $this->hasMany('App\HoaDonLe','dh_ma','dh_ma');
    }

    public function khachHang()
    {
        return $this->belongsTo('App\KhachHang','kh_ma','kh_ma');
    }
    public function nhanVienXuLy()
    {
        return $this->belongsTo('App\NhanVien','nv_xuly','nv_ma');
    }
    public function nhanGiaoHang()
    {
        return $this->belongsTo('App\NhanVien','nv_giaohang','nv_ma');
    }
    public function vanChuyen()
    {
        return $this->belongsTo('App\VanChuyen','vc_ma','vc_ma');
    }
    public function thanhToan()
    {
        return $this->belongsTo('App\ThanhToan','tt_ma','tt_ma');
    }
}
