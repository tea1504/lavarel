<?php

use Illuminate\Database\Seeder;

class ChitietDonhangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_chi_tiet_don_hang')->insert($list);
    }
}
