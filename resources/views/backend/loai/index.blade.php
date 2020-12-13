@extends('backend.layouts.master')
@section('title')
Danh sách loại sản phẩm
@endsection
@section('content')
    @if(Session::has('alert-success'))
    <div class="alert alert-success">
        {{ Session::get('alert-success') }}
    </div>
    @endif
    <a class="btn btn-primary my-5" href="{{route('backend.loai.create')}}">Thêm</a>
    <table class="table table-hover shadow-lg table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tên</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dsLoai as $loai)
            <tr>
                <td scope="row" class="align-middle">{{$loai->l_ma}}</td>
                <td class="align-middle">{{$loai->l_ten}}</td>
                <td class="align-middle">
                    @if($loai->l_trangthai == 1)
                        Khóa
                    @else 
                        Khả dụng
                    @endif
                </td>
                <td class="align-middle">
                    <a href="{{ route('backend.loai.destroy', ['id' => $loai->l_ma]) }}" class="btn btn-success">Sửa</a>
                    <form class="fDelete btn p-0" method="POST" action="{{ route('backend.loai.destroy', ['id' => $loai->l_ma]) }}" data-id="{{ $loai->l_ma }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE"/>
                        <button class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('custom-scripts')
<script>
    $('.fDelete').submit(function(e){
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
                    success: function(data, textStatus, jqXHR ){
                        location.href = "{{ route('backend.loai.index') }}";
                    }
                })
            } else{
                Swal.fire(
                    'Đã hủy xóa!'
                )
            }
        })
    });
</script>
@endsection