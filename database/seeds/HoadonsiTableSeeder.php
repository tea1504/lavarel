<?php

use Illuminate\Database\Seeder;

class HoadonsiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_hoa_don_si')->insert($list);
    }
}
