<h1>Danh sách sản phẩm</h1>
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
                Giá
            </td>
            <td>
                Loại
            </td>
            <td>
                Trạng thái
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach($ds_sanpham as $sanpham)
            <tr>
                <td>
                    {{$sanpham->sp_ma}}
                </td>
                <td>
                    {{$sanpham->sp_ten}}
                </td>
                <td>
                    {{number_format($sanpham->sp_giaGoc, 0, ",", ",")}}
                </td>
                <td>
                    {{$sanpham->loaiSanPham->l_ten}}
                </td>
                <td>
                    @if($sanpham->sp_trangThai==2)
                        <span style="background: green; color:white;">Còn bán</span> 
                    @else 
                        <span style="background: red;">Đã Khóa</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>