<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class PhieuNhapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $todate = new DateTime();
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $faker = Faker\Factory::create('vi_VN');
        for($i=1; $i<=5; $i++){

            array_push($list,[
                'pn_ma' => $i,
                'pn_nguoigiao' => $uFN->FullNames(VnBase::VnMale,   1)[0],
                'pn_sohoadon' => $i,
                'pn_ngayxuathoadon' => $faker->dateTimeBetween('-1 years', 'now', null),
                'pn_ghichu' => $faker->realText(100, 1),
                'nv_nguoilapphieu' => $faker->numberBetween(1,10),
                'pn_ngaylapphieu' => $faker->dateTimeBetween('-1 years', 'now', null),
                'nv_ketoan' => $faker->numberBetween(1,10),
                'pn_ngayxacnhan' => $faker->dateTimeBetween('-1 years', 'now', null),
                'nv_thukho' => $faker->numberBetween(1,10),
                'pn_ngaynhapkho' => $faker->dateTimeBetween('-1 years', 'now', null),
                'pn_taoMoi' => $todate,
                'pn_capNhat' => $todate,
                'pn_trangThai' => '2',
                'ncc_ma' => $faker->numberBetween(2, 14)
            ]);
        }
        DB::table('cusc_phieu_nhap')->insert($list);
    }
}
