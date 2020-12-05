<?php

use Illuminate\Database\Seeder;

class KhuyenmaiTableSeeder extends Seeder
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
        $today = new DateTime();
        $faker    = Faker\Factory::create('vi_VN');
        for ($i=1; $i <= 30; $i++) {
            $date = $faker->dateTimeBetween('-1 years','-6 months','Asia/Ho_Chi_Minh');
            $date2 = $faker->dateTimeBetween('-1 years',$date,'Asia/Ho_Chi_Minh');
            array_push($list, [
                'km_ten'                  => "km_ten $i",
                'km_noiDung'              => $faker->realText(100, 1),
                'km_batDau'               => $date,
                'km_ketThuc'              => $faker->dateTimeBetween($date,'now','Asia/Ho_Chi_Minh'),
                'nv_nguoiLap'             => $faker->numberBetween(1, 10),
                'km_ngayLap'              => $date2,
                'nv_kyNhay'               => $faker->numberBetween(1, 10),
                'km_ngayKyNhay'           => $faker->dateTimeBetween($date2,$date,'Asia/Ho_Chi_Minh'),
                'nv_kyDuyet'              => $faker->numberBetween(1, 10),
                'km_ngayDuyet'            => $faker->dateTimeBetween($date2,$date,'Asia/Ho_Chi_Minh'),
                'km_taoMoi'               => $date,
                'km_capNhat'              => $today->format('Y-m-d H:i:s'),
                'km_trangThai'            => 1
            ]);
        }
        DB::table('cusc_khuyen_mai')->insert($list);
    }
}
