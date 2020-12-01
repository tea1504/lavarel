<?php

use Illuminate\Database\Seeder;

class ChitietnhapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_chi_tiet_nhap')->insert($list);
    }
}
