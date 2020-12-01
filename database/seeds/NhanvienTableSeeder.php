<?php

use Illuminate\Database\Seeder;

class NhanvienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_nhan_vien')->insert($list);
    }
}
