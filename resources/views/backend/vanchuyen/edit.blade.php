@extends('backend.layouts.master')
@section('title')
Chỉnh sửa phương thức vận chuyển
@endsection
@section('custom-css')
@endsection
@section('content')
<div class="card shadow-lg">
    <div class="card-header">
        <h1>Chỉnh sửa phương thức vận chuyển <span class="badge badge-info">{{ $vanchuyen->vc_ten }}</span></h1>
    </div>
    <div class="card-body">
        <form name="frmEdit" id="frmEdit" method="post" action="{{ route('backend.vanchuyen.update', ['id' => $vanchuyen->vc_ma]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT"/>
            <div class="form-group">
                <label>Mã phương thức</label>
                <input type="text" class="form-control" value="{{ $vanchuyen->vc_ma }}" readonly>
            </div>
            <div class="form-group">
                <label for="vc_ten">Tên phương thức</label>
                <input type="text" class="form-control" id="vc_ten" name="vc_ten" value="{{ old('vc_ten', $vanchuyen->vc_ten) }}">
            </div>
            <div class="form-group">
                <label for="vc_chiphi">Chi phí</label>
                <input type="number" class="form-control" id="vc_chiphi" name="vc_chiphi" value="{{ old('vc_chiphi', $vanchuyen->vc_chiphi) }}">
            </div>
            <div class="form-group">
                <label for="vc_diengiai">Diễn giải</label>
                <textarea name="vc_diengiai" id="vc_diengiai" class="form-control" rows="5">{{ old('vc_diengiai', $vanchuyen->vc_diengiai) }}</textarea>
            </div>
            <div class="form-group">
                <label for="vc_trangthai">Trạng thái</label>
                <select name="vc_trangthai" class="form-control">
                    <option value="1" {{ old('vc_trangThai',$vanchuyen->vc_trangThai) == 1 ? "selected" : "" }}>Khóa</option>
                    <option value="2" {{ old('vc_trangThai',$vanchuyen->vc_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Lưu</button>
            <a href="{{ route('backend.vanchuyen.index') }}" class="btn btn-primary mt-3">Quay về</a>
        </form>
    </div>
</div>
@endsection
@section('custom-scripts')

@endsection