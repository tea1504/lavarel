@extends('backend.layouts.master')
@section('title')
Tạo mới phương thức vận chuyển
@endsection
@section('content')
<div class="card shadow-lg">
    <div class="card-header">
        <h1>Thêm mới phương thức vận chuyển</h1>
    </div>
    <div class="card-body">
        <form name="fCreate" id="fCreate" action="{{route('backend.vanchuyen.store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="vc_ten">Nhập tên: </label>
                <input type="text" class="form-control" name="vc_ten" id="vc_ten" value="{{ old('vc_ten') }}" placeholder="Nhập tên phương thức vận chuyển">
            </div>
            <div class="form-group">
                <label for="vc_chiphi">Nhập chi phí: </label>
                <input type="number" class="form-control" name="vc_chiphi" id="vc_chiphi" min=0 value="{{ old('vc_chiphi') }}" placeholder="Nhập chi phí vận chuyển">
            </div>
            <div class="form-group">
                <label for="vc_trangthai">Diễn giải: </label>
                <textarea name="vc_diengiai" id="vc_diengiai" rows="3" class="form-control" placeholder="Nhập diễn giải (nếu có)"></textarea>
            </div>
            <div class="form-group">
                <label for="vc_trangthai">Trạng thái: </label>
                <select name="vc_trangthai" id="vc_trangthai" class="custom-select custom-select mb-3">
                    <option value="1" {{ old('vc_trangthai')==1 ? 'selected' : '' }}>Khóa</option>
                    <option value="2" {{ old('vc_trangthai')==2 ? 'selected' : '' }}>Khả dụng</option>
                </select>
            </div>
            <button class="btn btn-primary">Thêm</button>
            <a href="{{ route('backend.vanchuyen.index') }}" class="btn btn-secondary">Quay về</a>
        </form>
    </div>
</div>
@endsection