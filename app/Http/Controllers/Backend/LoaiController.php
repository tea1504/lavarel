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
use App\Exports\LoaiExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function print(){
        $ds_loai = Loai::all();
        return view('backend.loai.print')
            -> with('ds_loai', $ds_loai);
    }
    /**
     * Action xuất Excel
     */
    public function excel()
    {
        /* Code dành cho việc debug
            - Khi debug cần hiển thị view để xem trước khi Export Excel
        */
        // $ds_sanpham = Sanpham::all();
        // $ds_loai    = Loai::all();
        // return view('backend.sanpham.excel')
        //     ->with('danhsachsanpham', $ds_sanpham)
        //     ->with('danhsachloai', $ds_loai);

        return Excel::download(new LoaiExport, 'danhsachloaisanpham.xlsx');
    }
    public function pdf()
    {
        $ds_loai    = Loai::all();
        $data = [
            'dsloai'    => $ds_loai,
        ];

        /* Code dành cho việc debug
    - Khi debug cần hiển thị view để xem trước khi Export PDF
    */
        // return view('backend.loai.pdf')
        //     ->with('dsloai', $ds_loai);

        $pdf = PDF::loadView('backend.loai.pdf', $data);
        return $pdf->download('DanhMucLoaiSanPham.pdf');
    }
}
