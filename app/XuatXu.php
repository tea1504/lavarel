<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XuatXu extends Model
{
    const CREATED_AT = 'xx_taomoi';
    const UPDATED_AT = 'xx_capnhat';

    protected $table = 'cusc_xuat_xu';
    protected $fillable     = ['xx_ten', 'xx_taomoi', 'xx_capnhat', 'xx_trangthai'];
    protected $guarded      = ['xx_ma'];

    protected $primaryKey   = 'xx_ma';

    protected $dates        = ['xx_taomoi', 'xx_capnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachNhaCungCap(){
        return $this->hasMany('App\NhaCungCap','xx_ma','xx_ma');
    }
}
