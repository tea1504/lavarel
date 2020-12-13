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
    <a class="btn btn-primary" href="{{route('backend.loai.create')}}">Thêm</a>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <td scope="col">Mã</td>
                <td scope="col">Tên</td>
                <td scope="col">Trạng thái</td>
                <td scope="col">Hành động</td>
            </tr>
        </thead>
        <tbody>
        @foreach($dsLoai as $loai)
            <tr>
                <td>{{$loai->l_ma}}</td>
                <td>{{$loai->l_ten}}</td>
                <td>
                    @if($loai->l_trangthai == 1)
                        Khóa
                    @else 
                        Khả dụng
                    @endif
                </td>
                <td>
                    <a href="{{ route('backend.loai.destroy', ['id' => $loai->l_ma]) }}" class="btn btn-success">Sửa</a>
                    <form class="fDelete" method="POST" action="{{ route('backend.loai.destroy', ['id' => $loai->l_ma]) }}" data-id="{{ $loai->l_ma }}">
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