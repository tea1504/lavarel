<?php

use Illuminate\Database\Seeder;

class MauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Xanh lá', 'Xanh Dương', 'Đỏ', 'Vàng', 'Hồng', 'Đen', 'Trắng', 'Tím'];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = new DateTime();
        for($i=1; $i<=count($types); $i++){
            array_push($list,[
            'm_ma'     => $i,
            'm_ten'     => $types[$i-1],
            'm_taomoi'     => $today,
            'm_capnhat'     => $today,
            'm_trangthai'     => '2'
            ]);
        }
        DB::table('cusc_mau')->insert($list);
    }
}
