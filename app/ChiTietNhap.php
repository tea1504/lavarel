<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietNhap extends Model
{
    public    $timestamps   = false;

    protected $table        = 'cusc_chi_tiet_nhap';
    protected $fillable     = ['ctn_soluong', 'ctn_dongia'];
    protected $guarded      = ['pn_ma', 'sp_ma', 'm_ma'];

    protected $primaryKey   = ['pn_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;

    public function mau()
    {
        return $this->belongsTo('App\Mau','m_ma','m_ma');
    }
    public function phieuNhap()
    {
        return $this->belongsTo('App\PhieuNhap','pn_ma','pn_ma');
    }
    public function sanPham()
    {
        return $this->belongsTo('App\SanPham','sp_ma','sp_ma');
    }
}
