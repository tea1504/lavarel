<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use Carbon\Carbon;
use Validator;
use App\Http\Requests\LoaiCreateRequest;
use App\Http\Requests\LoaiUpdateRequest;
use Session;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsLoai = Loai::all();
        return view('backend.loai.index')
            -> with('dsLoai', $dsLoai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.loai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiCreateRequest $request)
    {
        $loai = new Loai();
        $loai->l_ten = $request->l_ten;
        $loai->l_trangthai = $request->l_trangthai;
        $loai->l_taomoi = Carbon::now();
        $loai->l_capnhat = Carbon::now();
        $loai->save();

        Session::flash('alert-success','Đã tạo mới thành công');

        return redirect(route('backend.loai.index'));
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
        $loai = Loai::find($id);
        return view('backend.loai.edit')
            ->with('loai', $loai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LoaiUpdateRequest $request, $id)
    {
        $loai = Loai::find($id);
        $loai->l_ten = $request->l_ten;
        $loai->l_trangthai = $request->l_trangthai;
        //$loai->l_taomoi = Carbon::now();
        $loai->l_capnhat = Carbon::now();
        $loai->save();

        Session::flash('alert-success','Đã chỉnh sửa thành công');

        return redirect(route('backend.loai.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai = Loai::find($id);
        $loai->delete();

        Session::flash('alert-success','Đã xóa thành công');
        return redirect(route('backend.loai.index'));
    }
}
