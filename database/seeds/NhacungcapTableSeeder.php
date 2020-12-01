<?php

use Illuminate\Database\Seeder;

class NhacungcapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_nha_cung_cap')->insert($list);
    }
}
