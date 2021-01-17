<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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
}
