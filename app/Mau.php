<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mau extends Model
{
    const CREATED_AT = 'm_taomoi';
    const UPDATED_AT = 'm_capnhat';

    protected $table = 'cusc_mau';
    protected $fillable     = ['m_ten', 'm_taomoi', 'm_capnhat', 'm_trangthai'];
    protected $guarded      = ['m_ma'];

    protected $primaryKey   = 'm_ma';

    protected $dates        = ['m_taomoi', 'm_capnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachMauSanPham(){
        return $this->hasMany('App\MauSanPham','m_ma','m_ma');
    }
    public function danhSachKhuyenMaiSanPham(){
        return $this->hasMany('App\KhuyenMaiSanPham','m_ma','m_ma');
    }
    public function danhSachChiTietNhap(){
        return $this->hasMany('App\ChiTietNhap','m_ma','m_ma');
    }
}
