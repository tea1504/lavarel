<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class NhanVien extends Model implements
AuthenticatableContract
{
    const CREATED_AT = 'nv_taomoi';
    const UPDATED_AT = 'nv_capnhat';

    protected $table = 'cusc_nhan_vien';
    protected $fillable     = ['nv_taomoi', 'nv_capnhat', 'nv_trangthai', 'nv_taikhoan','nv_matkhau','nv_hoten','nv_gioitinh','nv_email','nv_ngaysinh','nv_diachi','nv_dienthoai', 'q_ma'];
    protected $guarded      = ['nv_ma'];

    protected $primaryKey   = 'nv_ma';

    protected $dates        = ['nv_ngaysinh', 'nv_taomoi', 'nv_capnhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    // public function danhSachDonHangXuLy(){
    //     return $this->hasMany('App\DonHang','nv_ma','nv_xuly');
    // }
    // public function danhSachDonHangGiaoHang(){
    //     return $this->hasMany('App\DonHang','nv_ma','nv_giaohang');
    // }
    // public function danhSachKhuyenMaiNguoiLap(){
    //     return $this->hasMany('App\KhuyenMai','nv_ma','nv_nguoilap');
    // }
    // public function danhSachKhuyenMaiKyNhay(){
    //     return $this->hasMany('App\KhuyenMai','nv_ma','nv_kynhay');
    // }
    // public function danhSachKhuyenMaiKyDuyet(){
    //     return $this->hasMany('App\KhuyenMai','nv_ma','nv_kyduyet');
    // }
    // public function danhSachPhieuNhapNguoiLapPhieu(){
    //     return $this->hasMany('App\PhieuNhap','nv_ma','nv_nguoilapphieu');
    // }
    // public function danhSachPhieuNhapKeToan(){
    //     return $this->hasMany('App\PhieuNhap','nv_ma','nv_ketoan');
    // }
    // public function danhSachPhieuNhapThuKho(){
    //     return $this->hasMany('App\PhieuNhap','nv_ma','nv_thukho');
    // }

    // public function quyen(){
    //     return $this->belongsTo('App\Quyen', 'q_ma', 'q_ma');
    // }
    /**
     * Tên cột 'Ghi nhớ đăng nhập'
     * The column name of the "remember me" token.
     *
     * @var string
     */
    protected $rememberTokenName = 'nv_ghinhodangnhap';
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }
    /**
     * Hàm trả về tên cột dùng để tim `Mật khẩu`
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->nv_matkhau;
    }
    /**
     * Hàm dùng để trả về giá trị của cột "nv_ghinhodangnhap" session.
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }
    /**
     * Hàm dùng để set giá trị cho cột "nv_ghinhodangnhap" session.
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }
    /**
     * Hàm trả về tên cột dùng để chứa REMEMBER TOKEN
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['nv_matkhau'] = bcrypt($value);
    }
}
