<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    const CREATED_AT = 'ncc_taomoi';
    const UPDATED_AT = 'ncc_capnhat';

    protected $table = 'cusc_nha_cung_cap';
    protected $fillable     = ['ncc_taomoi', 'ncc_capnhat', 'ncc_trangthai', 'ncc_ten','ncc_daidien','ncc_diachi','ncc_dienthoai','ncc_email', 'xx_ma'];
    protected $guarded      = ['ncc_ma'];

    protected $primaryKey   = 'ncc_ma';

    protected $dates        = ['ncc_taomoi', 'ncc_capnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachPhieuNhap(){
        return $this->hasMany('App\PhieuNhap','ncc_ma','ncc_ma');
    }

    public function xuatXu(){
        return $this->belongsTo('App\XuatXu','xx_ma','xx_ma');
    }
}
