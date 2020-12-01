<?php

use Illuminate\Database\Seeder;

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
        DB::table('cusc_phieu_nhap')->insert($list);
    }
}
