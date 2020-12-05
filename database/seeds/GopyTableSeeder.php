<?php

use Illuminate\Database\Seeder;

class GopyTableSeeder extends Seeder
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
        for($i=1; $i<=20; $i++){
            array_push($list, [
                'gy_ma' => $i,
                'gy_noidung' => $faker->realText(100, 1),
                'kh_ma' => $faker->numberBetween(1, 30),
                'sp_ma' => $faker->numberBetween(1, 30)
            ]);
        }
        DB::table('cusc_gop_y')->insert($list);
    }
}
