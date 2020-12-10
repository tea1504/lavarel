<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class HoadonleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $list = [];
        for($i=1; $i<=5; $i++){
            array_push($list,[
                'hdl_ma' => $i,
                'hdl_nguoimuahang' => $uFN->FullNames(VnBase::VnMale,1)[0],
                'hdl_dienthoai' => $uPI->Mobile("", VnBase::VnFalse),
                'hdl_diachi' => $uPI->Address(),
                'nv_laphoadon' => $faker->numberBetween(1,10),
                'dh_ma' => $faker->numberBetween(1,15),
            ]);
        }
        DB::table('cusc_hoa_don_le')->insert($list);
    }
}
