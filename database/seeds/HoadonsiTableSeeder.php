<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class HoadonsiTableSeeder extends Seeder
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
                'hds_ma' => $i,
                'hds_nguoimuahang' => $uFN->FullNames(VnBase::VnMale,1)[0],
                'hds_tendonvi' => $i,
                'hds_diachi' => $uPI->Address(),
                'hds_masothue' => $i,
                'hds_sotaikhoan' => $i,
                'nv_laphoadon' => $faker->numberBetween(1,10),
                'nv_thutruong' => $faker->numberBetween(1,10),
                'dh_ma' => $faker->numberBetween(1,15),
                'tt_ma' => $faker->numberBetween(1,5)
            ]);
        }
        DB::table('cusc_hoa_don_si')->insert($list);
    }
}
