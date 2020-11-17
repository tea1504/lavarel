<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu bản thân</title>
    <style>
        table{
            width: 100%;
        }
        .title{
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td class="title">Họ và tên : </td>
                <td>{{ $ten }}</td>
            </tr>
            <tr>
                <td class="title">Giới tính : </td>
                <td>{{ $gioitinh }}</td>
            </tr>
            <tr>
                <td class="title">Ngày sinh : </td>
                <td>{{ $ngaysinh }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>