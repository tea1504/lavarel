<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    const     CREATED_AT    = 'km_taoMoi';
    const     UPDATED_AT    = 'km_capNhat';

    protected $table        = 'cusc_khuyen_mai';
    protected $fillable     = ['km_ten', 'km_noidung', 'km_batdau', 'km_ketthuc', 'km_giatri', 'nv_nguoilap', 'km_ngaylap', 'nv_kynhay', 'km_ngaykynhay', 'nv_kyduyet', 'km_ngayduyet', 'km_taoMoi', 'km_capNhat', 'km_trangThai'];
    protected $guarded      = ['km_ma'];

    protected $primaryKey   = 'km_ma';

    protected $dates        = ['km_batdau', 'km_ketthuc', 'km_ngaylap', 'km_ngaykynhay', 'km_ngayduyet', 'km_taoMoi', 'km_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachSanPhamKhuyenMai(){
        return $this->hasMany('App\SanPhamKhuyenMai','km_ma','km_ma');
    }

    public function nhanVienNguoiLap(){
        return $this->belongsTo('App\NhanVien','nv_nguoilap','nv_ma');
    }
    public function nhanVienKyNhay(){
        return $this->belongsTo('App\NhanVien','nv_kynhay','nv_ma');
    }
    public function nhanVienKyDuyet(){
        return $this->belongsTo('App\NhanVien','nv_kyduyet','nv_ma');
    }
}
