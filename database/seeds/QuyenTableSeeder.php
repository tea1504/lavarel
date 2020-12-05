<?php

use Illuminate\Database\Seeder;

class QuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Giám đốc', 'Quản trị', 'Quản lý kho', 'kế toán', 'Nhân viên kinh doanh', 'Nhân viên giao hàng'];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = new DateTime();
        for($i=1; $i<=count($types); $i++){
            array_push($list,[
            'q_ma'     => $i,
            'q_ten'     => $types[$i-1],
            'q_diengiai'     => '',
            'q_taomoi'     => $today,
            'q_capnhat'     => $today,
            'q_trangthai'     => '2'
            ]);
        }
        DB::table('cusc_quyen')->insert($list);
    }
}
