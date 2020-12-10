<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MauSanPham extends Model
{
    public    $timestamps   = false;

    protected $table = 'cusc_mau_san_pham';
    protected $fillable     = ['msp_soluong'];
    protected $guarded      = ['m_ma', 'sp_ma'];

    protected $primaryKey   = ['m_ma', 'sp_ma'];

    public function mau(){
        return $this->belongsTo('App\Mau', 'm_ma', 'm_ma');
    }
    public function sanPham(){
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');
    }
}
