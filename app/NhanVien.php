<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    const CREATED_AT = 'nv_taomoi';
    const UPDATED_AT = 'nv_capnhat';

    protected $table = 'cusc_nhan_vien';
    protected $fillable     = ['nv_taomoi', 'nv_capnhat', 'nv_trangthai', 'nv_taikhoan','nv_matkhau','nv_hoten','nv_gioitinh','nv_email','nv_ngaysinh','nv_diachi','nv_dienthoai', 'q_ma'];
    protected $guarded      = ['nv_ma'];

    protected $primaryKey   = 'nv_ma';

    protected $dates        = ['nv_taomoi', 'nv_capnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function danhSachDonHangXuLy(){
        return $this->hasMany('App\DonHang','nv_ma','nv_xuly');
    }
    public function danhSachDonHangGiaoHang(){
        return $this->hasMany('App\DonHang','nv_ma','nv_giaohang');
    }
    public function danhSachKhuyenMaiNguoiLap(){
        return $this->hasMany('App\KhuyenMai','nv_ma','nv_nguoilap');
    }
    public function danhSachKhuyenMaiKyNhay(){
        return $this->hasMany('App\KhuyenMai','nv_ma','nv_kynhay');
    }
    public function danhSachKhuyenMaiKyDuyet(){
        return $this->hasMany('App\KhuyenMai','nv_ma','nv_kyduyet');
    }
    public function danhSachPhieuNhapNguoiLapPhieu(){
        return $this->hasMany('App\PhieuNhap','nv_ma','nv_nguoilapphieu');
    }
    public function danhSachPhieuNhapKeToan(){
        return $this->hasMany('App\PhieuNhap','nv_ma','nv_ketoan');
    }
    public function danhSachPhieuNhapThuKho(){
        return $this->hasMany('App\PhieuNhap','nv_ma','nv_thukho');
    }

    public function quyen(){
        return $this->belongsTo('App\Quyen', 'q_ma', 'q_ma');
    }
}
