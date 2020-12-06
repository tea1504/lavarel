<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VanChuyen extends Model
{
    const CREATED_AT = 'vc_taomoi';
    const UPDATED_AT = 'vc_capnhat';

    protected $table = 'cusc_van_chuyen';
    protected $fillable     = ['vc_ten', 'vc_chiphi', 'vc_diengiai', 'vc_taomoi', 'vc_capnhat', 'vc_trangthai'];
    protected $guarded      = ['vc_ma'];

    protected $primaryKey   = 'vc_ma';

    protected $dates        = ['vc_taomoi', 'vc_capnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

}
