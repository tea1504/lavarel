@extends('backend.layouts.master')
@section('title')
Danh sách loại sản phẩm
@endsection
@section('content')
    <a class="btn btn-primary" href="{{route('backend.loai.create')}}">Thêm</a>
    <table class="table">
        <thead>
            <tr>
                <td>Mã</td>
                <td>Tên</td>
            </tr>
        </thead>
        <tbody>
        @foreach($dsLoai as $loai)
            <tr>
                <td>{{$loai->l_ma}}</td>
                <td>{{$loai->l_ten}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection