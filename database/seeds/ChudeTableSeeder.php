<?php

use Illuminate\Database\Seeder;

class ChudeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_chu_de')->insert($list);
    }
}
