<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonLe extends Model
{
    public    $timestamps   = false;

    protected $table        = 'cusc_hoa_don_le';
    protected $fillable     = ['hdl_nguoimuahang', 'hdl_dienthoai', 'hdl_diachi', 'nv_laphoadon', 'hdl_ngayxuathoadon', 'dh_ma'];
    protected $guarded      = ['hdl_ma'];

    protected $primaryKey   = 'hdl_ma';

    protected $dates        = ['hdl_ngayxuathoadon'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nhanVienLapHoaDon(){
        return $this->belongsTo('App\NhanVien', 'nv_laphoadon', 'nv_ma');
    }
    public function donHang(){
        return $this->belongsTo('App\DonHang', 'dh_ma', 'dh_ma');
    }
}
