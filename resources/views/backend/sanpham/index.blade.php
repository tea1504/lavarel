@extends('backend.layouts.master')
@section('title')
Danh sách sản phẩm
@endsection
@section('custom-css')
<style>
    table{
        font-size: .8em;
    }
</style>
@endsection
@section('content')
@if(Session::has('alert-success'))
<div class="alert alert-success">
    {{ Session::get('alert-success') }}
</div>
@endif
<a class="btn btn-primary my-5" href="{{route('sanpham.create')}}">Thêm</a>
<table class="table table-hover shadow-lg table-striped">
    <thead class="thead-light">
        <tr>
            <th scope="col">Mã</th>
            <th scope="col">Tên</th>
            <th scope="col">Giá gốc</th>
            <th scope="col">Giá bán</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Thông tin</th>
            <th scope="col">Đánh giá</th>
            <th scope="col">Loại</th>
            <th scope="col">Tạo mới</th>
            <th scope="col">Cập nhật</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ds_sanpham as $sanpham)
        <tr>
            <td scope="row" class="align-middle">{{$sanpham->sp_ma}}</td>
            <td class="align-middle">{{$sanpham->sp_ten}}</td>
            <td class="align-middle text-right">{{number_format ($sanpham->sp_giaGoc,0,'.',',')}}</td>
            <td class="align-middle text-right">{{number_format ($sanpham->sp_giaBan,0,'.',',')}}</td>
            <td class="align-middle"><img src="{{ asset('storage/photos/' . $sanpham->sp_hinh) }}" width="100px" alt="{{$sanpham->sp_hinh}}"/></td>
            <td class="align-middle">{{$sanpham->sp_thongTin}}</td>
            <td class="align-middle">{{$sanpham->sp_danhGia}}</td>
            <td class="align-middle">{{$sanpham->loaiSanPham->l_ten}}</td>
            <td class="align-middle">{{$sanpham->sp_taoMoi->format('d/m/Y')}}</td>
            <td class="align-middle">{{$sanpham->sp_capNhat->format('d/m/Y')}}</td>
            <td class="align-middle">
                @if($sanpham->sp_trangthai == 1)
                <span class="badge badge-danger">Khóa</span>
                @else
                <span class="badge badge-success">Khả dụng</span>
                @endif
            </td>
            <td class="align-middle">
                <a href="{{ route('sanpham.edit', ['sanpham' =>$sanpham->sp_ma]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form class="fDelete btn p-0" method="POST" action="{{ route('sanpham.destroy', ['sanpham' =>$sanpham->sp_ma]) }}" data-id="{{$sanpham->sp_ma }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function() {

        $('.fDelete').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn muốn xóa?',
                text: "Dữ liệu sẽ không thể phục hồi lại được",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Chấp nhận',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: {
                            id: $(this).data('id'),
                            _token: $(this).find('[name="_token"]').val(),
                            _method: $(this).find('[name="_method"]').val()
                        },
                        success: function(data, textStatus, jqXHR) {
                            location.href = "{{ route('backend.loai.index') }}";
                        }
                    })
                } else {
                    Swal.fire(
                        'Đã hủy xóa!'
                    )
                }
            })
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>
@endsection