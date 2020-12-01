<?php

use Illuminate\Database\Seeder;

class XuatxuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_xuat_xu')->insert($list);
    }
}
