@extends('backend.layouts.master')
@section('title')
Tạo mới loại sản phẩm
@endsection
@section('content')
    <form name="fCreate" id="fCreate" action="{{route('backend.loai.store')}}" method="post">
    {{ csrf_field() }}
        Nhập tên: <input type="text" name="l_ten" id="l_ten" value="{{ old('l_ten') }}">
        <select name="l_trangthai" id="l_trangthai">
            <option value="1" {{ old('l_trangthai')==1 ? 'selected' : '' }}>Khóa</option>
            <option value="2" {{ old('l_trangthai')==2 ? 'selected' : '' }}>Khả dụng</option>
        </select>
        <button class="btn btn-secondary">Thêm</button>
    </form>
@endsection