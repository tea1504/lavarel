<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    public    $timestamps   = false;

    protected $table        = 'cusc_chi_tiet_don_hang';
    protected $fillable     = ['ctdh_soluong', 'ctdh_dongia'];
    protected $guarded      = ['dh_ma', 'sp_ma', 'm_ma'];

    protected $primaryKey   = ['dh_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;

    public function donHang()
    {
        return $this->belongsTo('App\DonHang','dh_ma','dh_ma');
    }
    public function sanPham()
    {
        return $this->belongsTo('App\SanPham','sp_ma','sp_ma');
    }
    public function mau()
    {
        return $this->belongsTo('App\Mau','m_ma','m_ma');
    }
}
