<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\Loai;
use App\HinhAnh;
use Carbon\Carbon;
use App\Http\Requests\SanPhamCreateRequest;
use App\Http\Requests\SanPhamUpdateRequest;
use Session;
use Storage;
use App\Exports\SanPhamExport;
use Maatwebsite\Excel\Facades\Excel as Excel;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_sanpham = SanPham::all();
        return view('backend.sanpham.index')
            ->with('ds_sanpham', $ds_sanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_loai = Loai::all();
        return view('backend.sanpham.create')
            ->with('ds_loai', $ds_loai);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SanPhamCreateRequest $request)
    {
        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = Carbon::now();
        $sp->sp_capNhat = Carbon::now();
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if ($request->hasFile('sp_hinh')) {
            $file = $request->sp_hinh;

            // Lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }

        $sp->save();
        if ($request->hasFile('sp_hinhanhlienquan')) {
            $files = $request->sp_hinhanhlienquan;

            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->sp_hinhanhlienquan as $index => $file) {

                $file->storeAs('public/photos', $file->getClientOriginalName());

                // Tạo đối tưọng HinhAnh
                $hinhAnh = new HinhAnh();
                $hinhAnh->sp_ma = $sp->sp_ma;
                $hinhAnh->ha_stt = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }

        Session::flash('alert-success', 'Thêm sản phẩm thành công');
        return redirect()->route('backend.sanpham.index');
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
        $sanpham = SanPham::where('sp_ma', $id)->first();
        $ds_loai = Loai::all();
        return view('backend.sanpham.edit')
            ->with('sanpham', $sanpham)
            ->with('ds_loai', $ds_loai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SanPhamUpdateRequest $request, $id)
    {
        $sp = SanPham::where('sp_ma', $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_capNhat = Carbon::now();
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if ($request->hasFile('sp_hinh')) {
            Storage::delete('public/photos/' . $sp->sp_hinh);
            $file = $request->sp_hinh;

            // Lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }

        $sp->save();

        Session::flash('alert-success', 'Update sản phẩm thành công');
        return redirect()->route('backend.sanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = SanPham::where("sp_ma",  $id)->first();
        if (empty($sp) == false) {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->sp_hinh);
        }
        $sp->delete();

        Session::flash('alert-success', 'Xóa sản phẩm thành công');
        return redirect()->route('backend.sanpham.index');
    }

    public function print()
    {
        $ds_sanpham = Sanpham::all();
        $ds_loai    = Loai::all();

        return view('backend.sanpham.print')
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachloai', $ds_loai);
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

        return Excel::download(new SanPhamExport, 'danhsachsanpham.xlsx');
    }
}
