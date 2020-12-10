<?php

use Illuminate\Database\Seeder;

class KhuyenmaiSanphamTableSeeder extends Seeder
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
        for($i=1; $i<=30; $i++){
            $sp = [];
            for($j=1; $j<=5; $j++)
                array_push($sp, $faker->numberBetween(1, 30));
            $sp = array_unique($sp);
            foreach($sp as $k)
                array_push($list,[
                    'km_ma' => $i,
                    'sp_ma' => $k,
                    'm_ma' => $faker->numberBetween(1, 8)
                ]);
        }
        DB::table('cusc_khuyen_mai_san_pham')->insert($list);
    }
}
