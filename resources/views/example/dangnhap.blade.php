@extends('layouts.master')
@section('title')
dang nhap
@endsection
@section('content')
@if($dangnhap)
    <button>Đăng xuất</button>
@else
    <button>Đăng nhập</button>
@endif
<ul>
    @for ($i=1; $i<=$loop; $i++)
        <li>Lần {{ $i }}</li>
    @endfor
</ul>
<ul>
    @foreach($arr as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>
@endsection