<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function hello(){
        return view('example.hello');
    }
    public function gioithieu(){
        $name = 'Trần Văn Hòa';
        $sex = 'Nam';
        $dob = '15/04/2000';
        return view('example.gioithieu')
            ->with('ten', $name)
            ->with('gioitinh', $sex)
            ->with('ngaysinh', $dob);
    }
    public function php(){
        $ver = "7.4";
        return view('example.hocphp')
            -> with('ver', $ver);
    }
    public function hienthi(){
        $noidung = '<h1>Nội dung</h1>';
        return view('example.hienthi')
            ->with('noidung', $noidung);
    }
    public function dangnhap(){
        $dangnhap = true;
        $loop = 10;
        $arr = [1,3,5,7,9,2,4,6,8];
        return view('example.dangnhap')
            ->with('dangnhap', $dangnhap)
            ->with('loop', $loop)
            ->with('arr', $arr);
    }
}
