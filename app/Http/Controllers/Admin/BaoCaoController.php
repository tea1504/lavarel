<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Mau;
use App\MauSanPham;
use App\SanPham;

class BaoCaoController extends Controller
{
    
    /**
     * Action hiển thị view Báo cáo đơn hàng
     */
    public function donhang()
    {
        return view('backend.reports.donhang');
    }

    /**
     * Action AJAX get data cho báo cáo Đơn hàng
     */
    public function donhangData(Request $request)
    {
        $parameter = [
            'tuNgay' => $request->tuNgay,
            'denNgay' => $request->denNgay
        ];
        $data = DB::select('
            SELECT DATE(dh.dh_thoigiandathang) as thoiGian
                , SUM(ctdh.ctdh_soluong * ctdh.ctdh_dongia) as tongThanhTien
            FROM cusc_don_hang dh
            JOIN cusc_chi_tiet_don_hang ctdh ON dh.dh_ma = ctdh.dh_ma
            WHERE DATE(dh.dh_thoigiandathang) BETWEEN :tuNgay AND :denNgay
            GROUP BY dh.dh_thoigiandathang
        ', $parameter);
        return response()->json(array(
            'code'  => 200,
            'data' => $data,
        ));
    }
    public function loaiData(Request $request)
    {
        return response()->json(array(
            'code'  => 200,
            'data_mau' => Mau::all(),
            'data_sp' => DB::table('cusc_sanpham')
                            ->join('cusc_mau_san_pham', 'cusc_sanpham.sp_ma', '=', 'cusc_mau_san_pham.sp_ma')
                            ->join('cusc_mau', 'cusc_mau_san_pham.m_ma', '=', 'cusc_mau.m_ma')
                            ->select('cusc_mau_san_pham.m_ma', 'cusc_mau.m_ten', 'cusc_sanpham.*')
                            ->get()
        ));
    }
    public function loaiDataChar(Request $request)
    {
        $data = DB::select('
            SELECT 
                a.m_ten, 
                SUM(b.msp_soluong) AS soluong
            FROM 
                cusc_mau AS a, 
                cusc_mau_san_pham AS b
            WHERE 
                a.m_ma = b.m_ma
            GROUP BY 
                a.m_ten
        ');
        return response()->json(array(
            'code'  => 200,
            'data' => $data
        ));
    }
    public function loaiDataChar2(Request $request)
    {
        $parameter = [
            'ten' => $request->m,
        ];
        $data = DB::select('
            SELECT 
                c.sp_ten, b.msp_soluong
            FROM 
                cusc_mau AS a, 
                cusc_mau_san_pham AS b,
                cusc_sanpham AS c
            WHERE 
                a.m_ma = b.m_ma
            AND
                c.sp_ma = b.sp_ma
            AND
                a.m_ten like :ten
        ',$parameter);
        return response()->json(array(
            'code'  => 200,
            'data' => $data
        ));
    }
    public function loaiDataChar3(Request $request)
    {
        $parameter = [
            'ten' => $request->m,
        ];
        $data = DB::select('
            SELECT 
                c.sp_ten, b.msp_soluong
            FROM 
                cusc_mau AS a, 
                cusc_mau_san_pham AS b,
                cusc_sanpham AS c
            WHERE 
                a.m_ma = b.m_ma
            AND
                c.sp_ma = b.sp_ma
            AND
                a.m_ten like :ten
        ',$parameter);
        return response()->json(array(
            'code'  => 200,
            'data' => $data
        ));
    }
}
