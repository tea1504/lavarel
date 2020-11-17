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
}
