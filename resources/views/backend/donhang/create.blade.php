@extends('backend.layouts.master3')
@section('title')
Tạo mới hóa đơn
@endsection
@section('content')
<div class="card shadow-lg">
    <div class="card-header">
        <h1>Thêm mới hóa đơn</h1>
    </div>
    <div class="card-body">
        <form name="fCreate" id="fCreate" action="{{route('backend.loai.store')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="kh_ma">Khách hàng</label>
                <select name="kh_ma" id="kh_ma" class="form-control">
                    @foreach($dskh as $kh)
                    @if(old('kh_ma') == $kh->kh_ma)
                    <option value="{{ $kh->kh_ma }}" selected>{{ $kh->kh_hoten }} - {{ $kh->kh_dienthoai }}</option>
                    @else
                    <option value="{{ $kh->kh_ma }}">{{ $kh->kh_hoten }} - {{ $kh->kh_dienthoai }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nv_xuly">Nhân viên xử lý</label>
                <select name="nv_xuly" id="nv_xuly" class="form-control">
                    @foreach($dsnv as $nv)
                    @if(old('nv_xuly') == $nv->nv_ma)
                    <option value="{{ $nv->nv_ma }}" selected>{{ $nv->nv_ma }} - {{ $nv->nv_hoten }}</option>
                    @else
                    <option value="{{ $nv->nv_ma }}">{{ $nv->nv_ma }} - {{ $nv->nv_hoten }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nv_giaohang">Nhân viên giao hàng</label>
                <select name="nv_giaohang" id="nv_giaohang" class="form-control">
                    @foreach($dsnv as $nv)
                    @if(old('nv_giaohang') == $nv->nv_ma)
                    <option value="{{ $nv->nv_ma }}" selected>{{ $nv->nv_ma }} - {{ $nv->nv_hoten }}</option>
                    @else
                    <option value="{{ $nv->nv_ma }}">{{ $nv->nv_ma }} - {{ $nv->nv_hoten }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="vc_ma">Vận chuyển</label>
                <select name="vc_ma" id="vc_ma" class="form-control">
                    @foreach($dsvc as $vc)
                    @if(old('vc_ma') == $vc->vc_ma)
                    <option value="{{ $vc->vc_ma }}" selected>{{ $vc->vc_ten }}</option>
                    @else
                    <option value="{{ $vc->vc_ma }}">{{ $vc->vc_ten }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <label for="dh_thoigiandathang">Thời gian đặt hàng</label>
                    
                </div>
                <div class="col-6">
                    <label for="dh_thoigiannhanhang">Thời gian nhận hàng</label>
                </div>
            </div>
            <div class="form-group">
                <label for="tt_ma">Thanh toán</label>
                <select name="tt_ma" id="tt_ma" class="form-control">
                    @foreach($dstt as $tt)
                    @if(old('tt_ma') == $tt->tt_ma)
                    <option value="{{ $tt->tt_ma }}" selected>{{ $tt->tt_ten }}</option>
                    @else
                    <option value="{{ $tt->tt_ma }}">{{ $tt->tt_ten }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Thêm</button>
            <a href="{{ route('backend.donhang.index') }}" class="btn btn-secondary">Quay về</a>
        </form>
    </div>
</div>
@endsection