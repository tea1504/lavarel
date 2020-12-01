<?php

use Illuminate\Database\Seeder;

class MausanphamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_mau_san_pham')->insert($list);
    }
}
