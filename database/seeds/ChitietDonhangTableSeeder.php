<?php

use Illuminate\Database\Seeder;

class ChitietDonhangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $list = [];
        for($i=1; $i<=30; $i++){
            array_push($list,[
                'dh_ma' => $faker->numberBetween(1, 15),
                'sp_ma' => $faker->numberBetween(1, 30),
                'm_ma' => $faker->numberBetween(1, 8),
                'ctdh_soluong' => $faker->numberBetween(1, 10),
                'ctdh_dongia' => $faker->numberBetween(100,1000)*1000,
            ]);
        }
        DB::table('cusc_chi_tiet_don_hang')->insert($list);
    }
}
