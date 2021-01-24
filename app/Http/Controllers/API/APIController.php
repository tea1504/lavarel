<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class APIController extends Controller
{
    public function thongke_top3_sp_moi()
    {
        $result = [];
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function thongke_top3_sanpham_moinhat()
    {
        $result = DB::table('cusc_sanpham')
            ->join('cusc_loai', 'cusc_loai.l_ma', '=', 'cusc_sanpham.l_ma')
            ->orderBy('sp_taoMoi')
            ->take(3)
            ->get();
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function tim_sp(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        $giatu = $request->giatu;
        $giaden = $request->giaden;
        $sql = "SELECT * FROM cusc_sanpham WHERE 1=1";
        if (!empty($name))
            $sql .= " AND sp_ten LIKE '%$name%'";
        if (!empty($giatu))
            $sql .= " AND sp_giaBan >= $giatu";
        if (!empty($giaden))
            $sql .= " AND sp_giaBan <= $giaden";
        // dd($sql);
        $result = DB::select($sql);
        // dd($result);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
            'dd' => $sql,
            'dd2' => $request->all(),
        ));
    }
}
