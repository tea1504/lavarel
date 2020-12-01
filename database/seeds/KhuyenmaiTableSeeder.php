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
        DB::table('cusc_khuyen_mai')->insert($list);
    }
}
