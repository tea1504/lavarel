<?php

use Illuminate\Database\Seeder;

class DonhangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_don_hang')->insert($list);
    }
}
