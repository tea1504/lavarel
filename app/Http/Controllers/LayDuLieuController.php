<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loai;
use App\VanChuyen;
use App\SanPham;

class LayDuLieuController extends Controller
{
    public function getLoai(){
        $danhsach = Loai::all();
        return view('test.danhsachloai')
            -> with('ds_loai', $danhsach);
    }
    public function getVanChuyen(){
        $danhsach = VanChuyen::all();
        return view('test.danhsachvanchuyen')
            -> with('ds_vanchuyen', $danhsach);
    }
    public function getSanPham(){
        $danhsach = SanPham::all();
        return view('test.danhsachsanpham')
            -> with('ds_sanpham', $danhsach);
    }
}
