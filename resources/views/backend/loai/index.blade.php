@extends('backend.layouts.master3')
@section('title')
Danh sách loại sản phẩm
@endsection
@section('content')
@if(Session::has('alert-success'))
<div class="alert alert-success">
    {{ Session::get('alert-success') }}
</div>
@endif
<div class="btn-group my-5 text-center" role="group" aria-label="Basic example">
    <a class="btn btn-primary" href="{{route('backend.loai.create')}}">Thêm</a>
    <a href="{{ route('backend.loai.print') }}" class="btn btn-primary">In ấn</a>
    <a href="{{ route('backend.loai.excel') }}" class="btn btn-primary">Xuất Excel</a>
    <a href="{{ route('backend.loai.pdf') }}" class="btn btn-primary">Xuất PDF</a>
</div>
<table class="table table-hover shadow-lg">
    <thead class="thead-light">
        <tr>
            <th scope="col">Mã</th>
            <th scope="col">Tên</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Ngày cập nhật</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dsLoai as $loai)
        <tr data-tableid="table_{{$loop->index}}" class="tb">
            <td scope="row" class="align-middle">{{$loai->l_ma}}</td>
            <td class="align-middle">{{$loai->l_ten}}</td>
            <td class="align-middle">
                @if($loai->l_trangthai == 1)
                <span class="badge badge-danger">Khóa</span>
                @else
                <span class="badge badge-success">Khả dụng</span>
                @endif
            </td>
            <td class="align-middle">
                {{ $loai->l_taomoi->format('d/m/Y') }}
            </td>
            <td class="align-middle">
                {{ $loai->l_capnhat->format('d/m/Y') }}
            </td>
            <td class="align-middle">
                <a href="{{ route('backend.loai.edit', ['id' => $loai->l_ma]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form class="fDelete btn p-0" method="POST" action="{{ route('backend.loai.destroy', ['id' => $loai->l_ma]) }}" data-id="{{ $loai->l_ma }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        <tr id="table_{{$loop->index}}" style="display: none;" class="p-0 subtb">
            <td colspan="6">
                <table class="w-100 table-striped m-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-right">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loai->danhSachSanPham as $sp)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $sp->sp_ten }}</td>
                            <td class="text-right">{{ number_format($sp->sp_giaGoc) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {
        $('.tb').click(function(e){
            $('.subtb').hide()
            var id = '#' + $(this).data('tableid');
            console.log(id);
            $(id).show();
        })
        $('.subtb thead').click(function(e){
            $('.subtb').hide();
        })
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