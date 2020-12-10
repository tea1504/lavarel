<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    const CREATED_AT = 'cd_taomoi';
    const UPDATED_AT = 'cd_capnhat';

    protected $table = 'cusc_chu_de';
    protected $fillable     = ['cd_ten', 'cd_taomoi', 'cd_capnhat', 'cd_trangthai'];
    protected $guarded      = ['cd_ma'];

    protected $primaryKey   = 'cd_ma';

    protected $dates        = ['cd_taomoi', 'cd_capnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachChuDeSanPham(){
        return $this->hasMany('App\ChuDeSanPham','cd_ma', 'cd_ma');
    }
}
