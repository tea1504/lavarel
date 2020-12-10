<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDeSanPham extends Model
{
    public    $timestamps   = false;

    protected $table        = 'cusc_chu_de_san_pham';
    protected $fillable     = [];
    protected $guarded      = ['sp_ma', 'cd_ma'];

    protected $primaryKey   = ['', 'cd_ma'];
    public    $incrementing = false;

    public function sanPham(){
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');
    }
    public function chuDe(){
        return $this->belongsTo('App\ChuDe', 'cd_ma', 'cd_ma');
    }
}
