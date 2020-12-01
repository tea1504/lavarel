<?php

use Illuminate\Database\Seeder;

class KhuyenmaiSanphamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        DB::table('cusc_khuyen_mai_san_pham')->insert($list);
    }
}
