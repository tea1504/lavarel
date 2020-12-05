<?php

use Illuminate\Database\Seeder;

class ChudeSanphamTableSeeder extends Seeder
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
            $mau = [];
            for($j=1; $j<=6; $j++)
                array_push($mau, $faker->numberBetween(1,6));
            $mau = array_unique($mau);
            foreach($mau as $m){
                array_push($list, [
                    'sp_ma'         =>  $i,
                    'cd_ma'          =>  $m
                ]);
            }
        }
        DB::table('cusc_chu_de_san_pham')->insert($list);
    }
}
