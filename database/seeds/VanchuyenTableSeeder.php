<?php

use Illuminate\Database\Seeder;

class VanchuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $faker    = Faker\Factory::create('vi_VN');
        $types = ['Miễn phí','Thường', 'Giao nhanh', '24h'];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = new DateTime();
        for($i=1; $i<=count($types); $i++){
            array_push($list,[
                'vc_ma' => $i,
                'vc_ten' => $types[$i-1],
                'vc_chiphi' => $faker->randomFloat(0, 30, 100)*1000,
                'vc_diengiai' => '',
                'vc_taomoi' => $today,
                'vc_capnhat' => $today,
                'vc_trangthai' => 2
            ]);
        }
        DB::table('cusc_van_chuyen')->insert($list);
    }
}
