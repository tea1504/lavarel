<?php

use Illuminate\Database\Seeder;

class XuatxuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Tây Tựu - Hà Nội', 'Nhật Tân - Hà Nội', 'Đằng Hải - Hải Phòng', 'Thái Phiên - Đà Lạt', 'Hà Đông - Đà Lạt', 'Vạn Thành - Đà Lạt', 'Sa Đéc - Đồng Tháp', 'Cái Mơn - Bến Tre', 'Phước Định - Vĩnh Long', 'Cẩm Hà - Hội An'];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = new DateTime();
        for($i=1; $i<=count($types); $i++){
            array_push($list,[
            'xx_ma'     => $i,
            'xx_ten'     => $types[$i-1],
            'xx_taomoi'     => $today,
            'xx_capnhat'     => $today,
            'xx_trangthai'     => '2'
            ]);
        }
        DB::table('cusc_xuat_xu')->insert($list);
    }
}
