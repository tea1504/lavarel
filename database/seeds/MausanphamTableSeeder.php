<?php

use Illuminate\Database\Seeder;

class MausanphamTableSeeder extends Seeder
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
            for($j=1; $j<=8; $j++)
                array_push($mau, $faker->numberBetween(1,8));
            $mau = array_unique($mau);
            foreach($mau as $m){
                array_push($list, [
                    'sp_ma'         =>  $i,
                    'm_ma'          =>  $m,
                    'msp_soluong'   =>  $faker->numberBetween(0,200)
                ]);
            }
        }
        DB::table('cusc_mau_san_pham')->insert($list);
    }
}
