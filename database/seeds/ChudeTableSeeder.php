<?php

use Illuminate\Database\Seeder;

class ChudeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Sinh nhật', 'Đám cười', 'Chúc mừng', 'Khai trương', 'Tân gia', 'Chia buồn'];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = new DateTime();
        for($i=1; $i<=count($types); $i++){
            array_push($list,[
            'cd_ma'     => $i,
            'cd_ten'     => $types[$i-1],
            'cd_taomoi'     => $today,
            'cd_capnhat'     => $today,
            'cd_trangthai'     => '2'
            ]);
        }
        DB::table('cusc_chu_de')->insert($list);
    }
}
