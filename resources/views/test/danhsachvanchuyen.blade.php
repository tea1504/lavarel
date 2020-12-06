<h1>Danh sách vận chuyển</h1>
<table border="1" width="100%">
    <thead>
        <tr>
            <td>
                Mã loại
            </td>
            <td>
                Tên
            </td>
            <td>
                Ngày tạo
            </td>
            <td>
                Cập nhật
            </td>
            <td>
                Trạng thái
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach($ds_vanchuyen as $vanchuyen)
            <tr>
                <td>
                    {{$vanchuyen->vc_ma}}
                </td>
                <td>
                    {{$vanchuyen->vc_ten}}
                </td>
                <td>
                    {{$vanchuyen->vc_taomoi}}
                </td>
                <td>
                    {{$vanchuyen->vc_capnhat}}
                </td>
                <td>
                    {{$vanchuyen->vc_trangthai}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>