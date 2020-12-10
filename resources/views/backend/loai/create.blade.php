@extends('backend.layouts.master')
@section('title')
Tạo mới loại sản phẩm
@endsection
@section('content')
    <form action="{{route('backend.loai.store')}}" method="post">
        Nhập tên: <input type="text" name="l_ten" id="l_ten">
        <button>Thêm</button>
    </form>
@endsection