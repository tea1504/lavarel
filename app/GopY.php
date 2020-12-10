<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GopY extends Model
{
    public    $timestamps   = false;

    protected $table = 'cusc_gop_y';
    protected $fillable     = ['gy_thoigian','gy_noidung','kh_ma','sp_ma','kh_trangthai'];
    protected $guarded      = ['gy_ma'];

    protected $primaryKey   = 'gy_ma';

    protected $dates        = ['gy_thoigian'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function khachHang(){
        return $this->belongsTo('App\KhachHang', 'kh_ma', 'kh_ma');
    }
    public function sanPham(){
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');
    }
}
