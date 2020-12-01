<?php

use Illuminate\Database\Seeder;

class ThanhToanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];
        $types=["Thanh toán bằng tiền mặt", "Thanh toán khi nhận hàng", "Ví điện tử MOMO", "Ví điện tử ZaloPay", "Thanh toán qua thẻ ngân hàng"];
        $today = new DateTime('2020-12-01 18:00:00');
        for($i=1; $i <= count($types); $i++){
            array_push($list, [
                'tt_ma'     => $i,
                'tt_ten'     => $types[$i-1],
                'tt_diengia'     => "",
                'tt_taomoi'     => $today,
                'tt_capnhat'     => $today,
                'tt_trangthai'     => 2
            ]);
        }
        DB::table('cusc_thanh_toan')->insert($list);
    }
}
