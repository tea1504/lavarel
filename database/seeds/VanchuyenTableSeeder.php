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
        $types = [];
        for($i=1; $i<=count($types); $i++){
            array_push($list,[
                'vc_ma' => $i,
                'vc_ten' => $types[$i-1],
                'vc_chiphi' => $i,
                'vc_diengiai' => $i,
                'vc_taomoi' => $i,
                'vc_capnhat' => $i,
                'vc_trangthai' => 2
            ]);
        }
        DB::table('cusc_van_chuyen')->insert($list);
    }
}
