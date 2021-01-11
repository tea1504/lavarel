@extends('backend.layouts.master2')
@section('title')
Thêm mới sản phẩm
@endsection
@section('custom-css')
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="card shadow-lg">
    <div class="card-header">
        <h1>Thêm mới sản phẩm</h1>
    </div>
    <div class="card-body">
        <form name="frmCreate" id="frmCreate" method="post" action="{{ route('backend.sanpham.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="l_ma">Loại sản phẩm</label>
                <select name="l_ma" class="form-control">
                    @foreach($ds_loai as $loai)
                    @if(old('l_ma') == $loai->l_ma)
                    <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                    @else
                    <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sp_ten">Tên sản phẩm</label>
                <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten') }}">
            </div>
            <div class="form-group">
                <label for="sp_giaGoc">Giá gốc</label>
                <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" value="{{ old('sp_giaGoc') }}">
            </div>
            <div class="form-group">
                <label for="sp_giaGoc">Giá bán</label>
                <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" value="{{ old('sp_giaBan') }}">
            </div>
            <div class="form-group">
                <label>Hình đại diện</label>
                <div class="file-loading">
                    <input id="sp_hinh" type="file" name="sp_hinh">
                </div>
            </div>
            <div class="form-group">
                <label for="sp_thongTin">Thông tin</label>
                <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ old('sp_thongTin') }}">
            </div>
            <div class="form-group">
                <label for="sp_danhGia">Đánh giá</label>
                <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" value="{{ old('sp_danhGia') }}">
            </div>
            <label>Trạng thái</label>
            <select name="sp_trangThai" class="form-control">
                <option value="1" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
                <option value="2" {{ old('sp_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
            </select>
            <div class="form-group mt-3">
                <label>Hình ảnh liên quan sản phẩm</label>
                <div class="file-loading">
                    <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Lưu</button>
        </form>
    </div>
</div>
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/Inputmask/dist/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/Inputmask/dist/bindings/inputmask.binding.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
        $("#sp_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
        $('#sp_giaGoc').inputmask({
            alias: 'currency',
            positionCaretOnClick: "radixFocus",
            radixPoint: ".",
            _radixDance: true,
            numericInput: true,
            groupSeparator: ",",
            suffix: ' vnđ',
            min: 0, // 0 ngàn
            max: 100000000, // 1 trăm triệu
            autoUnmask: true,
            removeMaskOnSubmit: true,
            unmaskAsNumber: true,
            inputtype: 'text',
            placeholder: "0",
            definitions: {
                "0": {
                    validator: "[0-9\uFF11-\uFF19]"
                }
            }
        });
        $('#sp_giaBan').inputmask({
            alias: 'currency',
            positionCaretOnClick: "radixFocus",
            radixPoint: ".",
            _radixDance: true,
            numericInput: true,
            groupSeparator: ",",
            suffix: ' vnđ',
            min: 0, // 0 ngàn
            max: 100000000, // 1 trăm triệu
            autoUnmask: true,
            removeMaskOnSubmit: true,
            unmaskAsNumber: true,
            inputtype: 'text',
            placeholder: "0",
            definitions: {
                "0": {
                    validator: "[0-9\uFF11-\uFF19]"
                }
            }
        });
    });
</script>
@endsection