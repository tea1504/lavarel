@extends('backend.layouts.master')
@section('title')
Danh sách đơn hàng
@endsection
@section('content')
@if(Session::has('alert-success'))
<div class="alert alert-success">
    {{ Session::get('alert-success') }}
</div>
@endif
<div class="btn-group my-5 text-center" role="group" aria-label="Basic example">
    <a class="btn btn-primary" href="{{route('backend.donhang.create')}}">Thêm</a>
    <a href="{{ route('backend.loai.print') }}" class="btn btn-primary">In ấn</a>
    <a href="{{ route('backend.loai.excel') }}" class="btn btn-primary">Xuất Excel</a>
    <a href="{{ route('backend.loai.pdf') }}" class="btn btn-primary">Xuất PDF</a>
</div>
<table class="table table-hover shadow-lg table-striped table-sm table-responsive">
    <thead class="thead-light">
        <tr>
            <th scope="col">Mã</th>
            <th scope="col">Khách hàng</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Ngày giao</th>
            <th scope="col">Người nhận</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Người gửi</th>
            <th scope="col">Lời chúc</th>
            <th scope="col">Thanh toán</th>
            <th scope="col">Xử lý</th>
            <th scope="col">Ngày xử lý</th>
            <th scope="col">Giao hàng</th>
            <th scope="col">Ngày giao hàng</th>
            <th scope="col">Ngày lập phiếu giao</th>
            <th scope="col">Ngày tạo mới</th>
            <th scope="col">Ngày cập nhật</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Vận chuyển</th>
            <th scope="col">Thanh toán</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dsdh as $dh)
        <tr>
            <td class="align-middle">{{ $dh->dh_ma }}</td>
            <td class="align-middle">{{ $dh->khachHang->kh_hoten}}</td>
            <td class="align-middle">{{ $dh->dh_thoigiandathang->format('d/m/y')}}</td>
            <td class="align-middle">{{ $dh->dh_thoigiannhanhang->format('d/m/y')}}</td>
            <td class="align-middle">{{ $dh->dh_nguoinhan}}</td>
            <td class="align-middle">{{ $dh->dh_diachi}}</td>
            <td class="align-middle">{{ $dh->dh_dienthoai}}</td>
            <td class="align-middle">{{ $dh->dh_nguoigui}}</td>
            <td class="align-middle">{{ $dh->dh_loichuc}}</td>
            <td class="align-middle text-center">
                @if($dh->dh_thanhtoan == 1)
                <i class="fa fa-check text-success" aria-hidden="true"></i>
                @else
                <i class="fa fa-times text-danger" aria-hidden="true"></i>
                @endif
            </td>
            <td class="align-middle">{{ $dh->nhanVienXuLy->nv_hoten }}</td>
            <td class="align-middle">{{ $dh->dh_ngayxuly->format('d/m/y') }}</td>
            <td class="align-middle">{{ $dh->nhanGiaoHang->nv_hoten }}</td>
            <td class="align-middle">{{ $dh->dh_ngaygiaohang->format('d/m/y') }}</td>
            <td class="align-middle">{{ $dh->dh_ngaylapphieugiao->format('d/m/y') }}</td>
            <td class="align-middle">{{ $dh->dh_taoMoi->format('d/m/y') }}</td>
            <td class="align-middle">{{ $dh->dh_capNhat->format('d/m/y') }}</td>
            <td class="align-middle">
                @if($dh->dh_trangThai == 1)
                <span class="badge badge-danger">Khóa</span>
                @else
                <span class="badge badge-success">Khả dụng</span>
                @endif
            </td>
            <td class="align-middle"><span class="badge badge-secondary">{{ $dh->vanChuyen->vc_ten }}</span></td>
            <td class="align-middle"><span class="badge badge-primary">{{ $dh->thanhToan->tt_ten }}</span></td>
            <td class="align-middle">
                @if($dh->dh_thanhtoan == 0)
                <a href="{{ route('backend.donhang.edit', ['id' => $dh->dh_ma]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form class="fDelete btn p-0" method="POST" action="{{ route('backend.donhang.destroy', ['id' => $dh->dh_ma]) }}" data-id="{{ $dh->dh_ma }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                @else
                <a href="{{ route('backend.donhang.edit', ['id' => $dh->dh_ma]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="In"><i class="fa fa-print" aria-hidden="true"></i></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function() {
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>
@endsection