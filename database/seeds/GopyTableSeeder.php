<?php

use Illuminate\Database\Seeder;

class GopyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_gop_y')->insert($list);
    }
}
