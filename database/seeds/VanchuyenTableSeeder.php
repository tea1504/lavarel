<?php

use Illuminate\Database\Seeder;

class VanchuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_van_chuyen')->insert($list);
    }
}
