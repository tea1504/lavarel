<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    const     CREATED_AT    = 'pn_taoMoi';
    const     UPDATED_AT    = 'pn_capNhat';

    protected $table        = 'cusc_phieunhap';
    protected $fillable     = ['pn_nguoigiao', 'pn_sohoadon', 'pn_ngayxuathoadon', 'pn_ghichu', 'nv_nguoilapphieu', 'pn_ngaylapphieu', 'nv_ketoan', 'pn_ngayxacnhan', 'nv_thukho', 'pn_ngaynhapkho', 'pn_taoMoi', 'pn_capNhat', 'pn_trangThai', 'ncc_ma'];
    protected $guarded      = ['pn_ma'];

    protected $primaryKey   = 'pn_ma';

    protected $dates        = ['pn_ngayxuathoadon', 'pn_ngaylapphieu', 'pn_ngayxacnhan', 'pn_ngaynhapkho', 'pn_taoMoi', 'pn_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachChiTietNhap(){
        return $this->hasMany('App\ChiTietNhap','pn_ma','pn_ma');
    }

    public function nhaCungCap(){
        return $this->belongsTo('App\NhaCungCap','ncc_ma','ncc_ma');
    }
    public function nhanVienNguoiLapPhieu(){
        return $this->belongsTo('App\NhanVien','nv_nguoilapphieu','vn_ma');
    }
    public function nhanVienKeToan(){
        return $this->belongsTo('App\NhanVien','nv_ketoan','vn_ma');
    }
    public function nhanVienThuKho(){
        return $this->belongsTo('App\NhanVien','nv_thukho','vn_ma');
    }
}
