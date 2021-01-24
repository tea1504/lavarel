@extends('backend.layouts.master3')
@section('title')
Danh sách phương thức vận chuyển
@endsection
@section('content')
@if(Session::has('alert-success'))
<div class="alert alert-success">
    {{ Session::get('alert-success') }}
</div>
@endif
<div class="btn-group my-5 text-center" role="group" aria-label="Basic example">
    <a class="btn btn-primary" href="{{route('backend.vanchuyen.create')}}">Thêm</a>
    <a href="{{ route('backend.sanpham.print') }}" class="btn btn-primary">In ấn</a>
    <a href="{{ route('backend.sanpham.excel') }}" class="btn btn-primary">Xuất Excel</a>
    <a href="{{ route('backend.sanpham.pdf') }}" class="btn btn-primary">Xuất PDF</a>
</div>
<table class="table table-hover shadow-lg table-striped">
    <thead class="thead-light">
        <tr>
            <th scope="col">Mã</th>
            <th scope="col">Tên</th>
            <th scope="col">Chi phí</th>
            <th scope="col">Diễn giải</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Ngày cập nhật</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dsvanchuyen as $vanchuyen)
        <tr>
            <td scope="row" class="align-middle">{{$vanchuyen->vc_ma}}</td>
            <td class="align-middle">{{$vanchuyen->vc_ten}}</td>
            <td class="align-middle">{{$vanchuyen->vc_chiphi}}</td>
            <td class="align-middle">{{$vanchuyen->vc_diengiai}}</td>
            <td class="align-middle">
                @if($vanchuyen->vc_trangthai == 1)
                <span class="badge badge-danger">Khóa</span>
                @else
                <span class="badge badge-success">Khả dụng</span>
                @endif
            </td>
            <td class="align-middle">
                {{ $vanchuyen->vc_taomoi->format('d/m/yy') }}
            </td>
            <td class="align-middle">
                {{ $vanchuyen->vc_capnhat->format('d/m/yy') }}
            </td>
            <td class="align-middle">
                <a href="{{ route('backend.vanchuyen.edit', ['vanchuyen' => $vanchuyen->vc_ma]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fas fa-edit"></i></a>
                <form class="fDelete btn p-0" method="POST" action="{{ route('backend.vanchuyen.destroy', ['vanchuyen' => $vanchuyen->vc_ma]) }}" data-id="{{ $vanchuyen->vc_ma }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$dsvanchuyen->links()}}
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
                            location.href = "{{ route('backend.vanchuyen.index') }}";
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