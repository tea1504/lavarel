<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMaiSanPham extends Model
{
    protected $table        = 'cusc_khuyen_mai_san_pham';
    protected $fillable     = ['kmsp_giatri', 'kmsp_trangthai'];
    protected $guarded      = ['km_ma', 'sp_ma', 'm_ma'];

    protected $primaryKey   = ['km_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;

    public function mau()
    {
        return $this->belongsTo('App\Mau','m_ma','m_ma');
    }
    public function khuyenMai()
    {
        return $this->belongsTo('App\KhuyenMai','km_ma','km_ma');
    }
    public function sanPham()
    {
        return $this->belongsTo('App\SanPham','sp_ma','sp_ma');
    }
}
