@extends('backend.layouts.master')
@section('title')
Tạo mới loại sản phẩm
@endsection
@section('content')
    <form name="fEdit" id="fEdit" action="{{route('backend.loai.update', ['id' => $loai->l_ma])}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        Nhập tên: <input type="text" name="l_ten" id="l_ten" value="{{ $loai->l_ten }}">
        <select name="l_trangthai" id="l_trangthai">
            <option value="1" {{ $loai->l_trangthai==1 ? 'selected' : '' }}>Khóa</option>
            <option value="2" {{ $loai->l_trangthai==2 ? 'selected' : '' }}>Khả dụng</option>
        </select>
        <button class="btn btn-secondary">Thêm</button>
    </form>
@endsection