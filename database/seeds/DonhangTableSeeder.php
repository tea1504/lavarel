<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class DonhangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $faker = Faker\Factory::create();
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = new DateTime();
        for ($i=1; $i <= 15; $i++) {
            array_push($list, [
                'kh_ma'                   => $faker->numberBetween(1, 30),
                'dh_thoiGianDatHang'      => $faker->dateTimeBetween('-3 months', 'now', 'Asia/Ho_Chi_Minh'),
                'dh_thoiGianNhanHang'     => $today->format('Y-m-d H:i:s'),
                'dh_nguoiNhan'            => $uFN->FullNames(VnBase::VnFemale, 1)[0],
                'dh_diaChi'               => $uPI->Address(),
                'dh_dienThoai'            => $uPI->Mobile("", VnBase::VnFalse),
                'dh_nguoiGui'             => $uFN->FullNames(VnBase::VnMale, 1)[0],
                'dh_loichuc'              => $faker->realText(50, 2),
                'dh_thanhtoan'          => $faker->numberBetween(0, 1),
                'nv_xuLy'                 => $faker->numberBetween(1, 10),
                'dh_ngayxuly'             => $today->format('Y-m-d H:i:s'),
                'nv_giaohang'             => $faker->numberBetween(1, 10),
                'dh_ngaylapphieugiao'     => $today->format('Y-m-d H:i:s'),
                'dh_ngaygiaohang'         => $today->format('Y-m-d H:i:s'),
                'dh_taomoi'               => $today->format('Y-m-d H:i:s'),
                'dh_capnhat'              => $today->format('Y-m-d H:i:s'),
                'dh_trangthai'            => '2',
                'vc_ma'                   => $faker->numberBetween(1, 4),
                'tt_ma'                   => $faker->numberBetween(1, 5)
            ]);
        }
        DB::table('cusc_don_hang')->insert($list);
    }
}
