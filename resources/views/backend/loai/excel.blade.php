<!DOCTYPE html>
<html>

<head>
    <title>Danh sách sản phẩm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>

<body style="font-size: 10px">
    <div class="row">
        <table border="0" align="center" cellpadding="5" style="border-collapse: collapse;">
            <tr>
                <td colspan="6" align="center" style="font-size: 13px;" width="100">
                    <b>Công ty TNHH Sunshine</b>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>http://sunshine.com/</b>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>(0292)3.888.999 # 01.222.888.999</b>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    {{-- Đây là khoảng trống dùng để chèn ảnh LOGO bằng Laravel Excel --}}
                    {{-- Khi hiển thị ảnh để xem trên WEB -> sử dụng đường dẫn URL bằng hàm asset() --}}
                    {{-- Khi xuất file Excel, muốn chèn hình ảnh phải sử dụng đường dẫn PATH bằng hàm public_path() --}}
                </td>
            </tr>
            <tr>
                <td colspan="6" class="caption" align="center" style="text-align: center; font-size: 20px">
                    <b>Danh sách loại sản phẩm</b>
                </td>
            </tr>
            <tr style="border: 1px thin #000">
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã loại</th>
                <th style="text-align: center">Tên loại</th>
                <th style="text-align: center">Ngày tạo</th>
                <th style="text-align: center">Ngày cập nhật</th>
                <th style="text-align: center">Trạng thái</th>
            </tr>
            @foreach ($dsloai as $l)
            <tr style="border: 1px thin #000; background-color: #ccc;">
                <td align="center" valign="middle" width="5">
                    {{ $loop->index + 1 }}
                </td>
                <td align="center" valign="middle" width="10">{{ $l->l_ma }}</td>
                <td align="left" valign="middle" width="50">{{ $l->l_ten }}</td>
                <td align="center" valign="middle" width="30">{{ $l->l_taomoi->format('d-m-Y') }}</td>
                <td align="center" valign="middle" width="30">{{ $l->l_capnhat->format('d-m-Y') }}</td>
                @if($l->l_trangthai == 1)
                <td align="center" valign="middle" width="15">Khóa</td>
                @else
                <td align="center" valign="middle" width="15">Khả dụng</td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
</body>