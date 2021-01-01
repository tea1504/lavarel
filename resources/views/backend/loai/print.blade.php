@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh sách sản phẩm
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
@endsection
@section('paper-toolbar-top')
<button><a href="{{route('backend.loai.index')}}">Quay về trang chủ</a></button>
@endsection

@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center">
            <tr>
                <td class="companyInfo" align="center">
                    Công ty TNHH Sunshine<br />
                    http://sunshine.com/<br />
                    (0292)3.888.999 # 01.222.888.999<br />
                    <img width="100px" src="{{ asset('storage/logo/logo.png') }}" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <table border="1" align="center" cellpadding="5" cellspacing="0" width="100%">
            <tr>
                <td style="font-weight: bold; text-align: center;" width="200px">Mã loại sản phẩm</td>
                <td style="font-weight: bold; text-align: center;">Tên loại sản phẩm</td>
            </tr>
            @foreach($ds_loai as $l)
            <tr>
                <td style="text-align: center;">{{ $l->l_ma }}</td>
                <td style="text-align: center;">{{ $l->l_ten }}</td>
            </tr>
            @endforeach
        </table>
    </article>
</section>
@endsection