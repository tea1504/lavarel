@extends('backend.layouts.master')
@section('title')
Tạo mới loại sản phẩm
@endsection
@section('content')
<div class="card shadow-lg">
    <div class="card-header">
        <h1>Thêm mới loại sản phẩm</h1>
    </div>
    <div class="card-body">
        <form name="fCreate" id="fCreate" action="{{route('backend.loai.store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="l_ten">Nhập tên: </label>
                <input type="text" class="form-control" name="l_ten" id="l_ten" value="{{ old('l_ten') }}" placeholder="Nhập tên loại sản phẩm">
            </div>
            <div class="form-group">
                <label for="l_trangthai">Trạng thái: </label>
                <select name="l_trangthai" id="l_trangthai" class="custom-select custom-select mb-3">
                    <option value="1" {{ old('l_trangthai')==1 ? 'selected' : '' }}>Khóa</option>
                    <option value="2" {{ old('l_trangthai')==2 ? 'selected' : '' }}>Khả dụng</option>
                </select>
            </div>
            <button class="btn btn-primary">Thêm</button>
            <a href="{{ route('backend.loai.index') }}" class="btn btn-secondary">Quay về</a>
        </form>
    </div>
</div>
@endsection