<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonSi extends Model
{
    const     CREATED_AT    = 'hds_taoMoi';
    const     UPDATED_AT    = 'hds_capNhat';

    protected $table        = 'cusc_hoa_don_si';
    protected $fillable     = ['hds_nguoimuahang', 'hds_tendonvi', 'hds_diachi', 'hds_masothue', 'hds_sotaikhoan', 'nv_laphoadon', 'hds_ngayxuathoadon', 'nv_thutruong', 'hds_taoMoi', 'hds_capNhat', 'hds_trangThai', 'dh_ma', 'tt_ma'];
    protected $guarded      = ['hds_ma'];

    protected $primaryKey   = 'hds_ma';

    protected $dates        = ['hds_ngayXuatHoaDon', 'hds_taoMoi', 'hds_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nhanVienLapHoaDon(){
        return $this->belongsTo('App\NhanVien', 'nv_laphoadon', 'nv_ma');
    }
    public function nhanVienThuTruong(){
        return $this->belongsTo('App\NhanVien', 'nv_thutruong', 'nv_ma');
    }
    public function thanhToan(){
        return $this->belongsTo('App\ThanhToan', 'tt_ma', 'tt_ma');
    }
    public function donHang(){
        return $this->belongsTo('App\DonHang', 'dh_ma', 'dh_ma');
    }
}
