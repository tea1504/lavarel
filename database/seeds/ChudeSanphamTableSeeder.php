<?php

use Illuminate\Database\Seeder;

class ChudeSanphamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_chu_de_san_pham')->insert($list);
    }
}
