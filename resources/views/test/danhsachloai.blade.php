<h1>Danh sách các loại hoa</h1>
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
            <td>
                Số lượng sản phẩm
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach($ds_loai as $loai)
            <tr>
                <td>
                    {{$loai->l_ma}}
                </td>
                <td>
                    {{$loai->l_ten}}
                </td>
                <td>
                    {{$loai->l_taomoi->format('h:i d/m/Y')}}
                </td>
                <td>
                    {{$loai->l_capnhat->format('h:i d/m/Y')}}
                </td>
                <td>
                    @if($loai->l_trangthai==2)
                        Còn bán 
                    @else 
                        Đã Khóa
                    @endif
                </td>
                <td>
                    {{$loai->danhSachSanPham->count()}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>