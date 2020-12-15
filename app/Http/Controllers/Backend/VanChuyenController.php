<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VanChuyen;
use App\Http\Requests\VanChuyenCreateRequest;
use Carbon\Carbon;
use Session;

class VanChuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsvanchuyen = VanChuyen::all();
        return view('backend.vanchuyen.index')
            ->with('dsvanchuyen', $dsvanchuyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vanchuyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VanChuyenCreateRequest $request)
    {
        $vanchuyen = new VanChuyen();
        $vanchuyen->vc_ten = $request->vc_ten;
        $vanchuyen->vc_chiphi = $request->vc_chiphi;
        $vanchuyen->vc_diengiai = $request->vc_diengiai;
        $vanchuyen->vc_taomoi = Carbon::now();
        $vanchuyen->vc_capnhat = Carbon::now();
        $vanchuyen->vc_trangthai = $request->vc_trangthai;
        $vanchuyen->save();

        Session::flash('alert-success','Đã tạo mới thành công');

        return redirect(route('backend.vanchuyen.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
