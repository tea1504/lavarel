<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    const CREATED_AT = 'sp_taoMoi';
    const UPDATED_AT = 'sp_capNhat';

    protected $table = 'cusc_sanpham';
    protected $fillable     = ['sp_ten', 'sp_giaGoc', 'sp_giaBan', 'sp_hinh', 'sp_thongTin', 'sp_danhGia', 'sp_taoMoi', 'sp_capNhat', 'sp_trangThai', 'l_ma'];
    protected $guarded      = ['sp_ma'];

    protected $primaryKey   = 'sp_ma';

    protected $dates        = ['sp_taoMoi', 'sp_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachHinhAnh(){
        return $this->hasMany('App\HinhAnh','sp_ma','sp_ma');
    }
    public function danhSachMauSanPham(){
        return $this->hasMany('App\MauSanPham','sp_ma','sp_ma');
    }
    public function danhSachGopY(){
        return $this->hasMany('App\GopY','sp_ma','sp_ma');
    }
    public function danhSachChuDeSanPham(){
        return $this->hasMany('App\ChuDeSanPham','sp_ma','sp_ma');
    }
    public function danhSachChiTietDonHang(){
        return $this->hasMany('App\ChiTietDonHang','sp_ma','sp_ma');
    }

    public function loaiSanPham(){
        return $this->belongsTo('App\Loai', 'l_ma', 'l_ma');
    }
}
