<!DOCTYPE html>
<html>

<head>
    <title>Danh sách loại sản phẩm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }

        body {
            font-size: 10px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            vertical-align: middle;
        }

        caption {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .hinhSanPham {
            width: 100px;
            height: 100px;
        }

        .companyInfo {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .companyImg {
            width: 200px;
            height: 200px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="row">
        <table border="0" align="center">
            <tr>
                <td class="companyInfo">
                    Công ty Nền tảng<br />
                    http://sunshine.com/<br />
                    (0292)3.888.999 # 01.222.888.999<br />
                    <img src="{{ asset('img/logo.png') }}" class="companyImg" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php
        $soTrang = 10;
        $tongSoTrang = ceil(count($dsloai) / $soTrang);
        ?>
        <table border="1" align="center" cellpadding="5" width="500px">
            <caption>Danh sách loại sản phẩm</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr style="background-color: #81ecec;">
                <th>STT</th>
                <th>Mã loại</th>
                <th width="30%">Tên loại</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Trạng thái</th>
            </tr>
            @foreach ($dsloai as $l)
            @if($l->l_trangthai==1)
            <tr style="background-color: #b2bec3; font-style: italic;">
            @else
            <tr>
            @endif
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="center">{{ $l->l_ma }}</td>
                <td style="font-weight: bold;">{{ $l->l_ten }}</td>
                <td align="center">{{ $l->l_taomoi->format('d/m/Y') }}</td>
                <td align="center">{{ $l->l_capnhat->format('d/m/Y') }}</td>
                @if($l->l_trangthai==1)
                <td align="center">Khóa</td>
                @else
                <td align="center">Khả dụng</td>
                @endif
            </tr>
            @if (($loop->index + 1) % $soTrang == 0 && (1 + floor(($loop->index + 1) / $soTrang) <= $tongSoTrang)) </table> <div class="page-break">
    </div>
    <table border="1" align="center" cellpadding="5" width="500px">
        <tr>
            <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / $soTrang) }} / {{ $tongSoTrang }}</th>
        </tr>
        <tr style="background-color: #81ecec;">
            <th>STT</th>
            <th>Mã loại</th>
            <th width="30%">Tên loại</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Trạng thái</th>
        </tr>
        @endif
        @endforeach
    </table>
    </div>
</body>

</html>