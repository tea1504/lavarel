@extends('backend.layouts.master')
@section('title')
Chỉnh sửa loại sản phẩm
@endsection
@section('content')
<div class="card shadow-lg">
    <div class="card-header">
        <h1>Chỉnh sửa loại sản phẩm <span class="badge badge-info">{{ $loai->l_ten }}</span></h1>
    </div>
    <div class="card-body">
        <form name="fEdit" id="fEdit" action="{{route('backend.loai.update', ['id' => $loai->l_ma])}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="l_ten">Nhập tên: </label>
                <input type="text" class="form-control" name="l_ten" id="l_ten" value="{{ $loai->l_ten }}" placeholder="Nhập tên loại sản phẩm">
            </div>
            <div class="form-group">
                <label for="l_trangthai">Trạng thái: </label>
                <select name="l_trangthai" id="l_trangthai" class="custom-select custom-select mb-3">
                    <option value="1" {{ $loai->l_trangthai==1 ? 'selected' : '' }}>Khóa</option>
                    <option value="2" {{ $loai->l_trangthai==2 ? 'selected' : '' }}>Khả dụng</option>
                </select>
            </div>
            <button class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('backend.loai.index') }}" class="btn btn-secondary">Quay về</a>
        </form>
    </div>
</div>
@endsection