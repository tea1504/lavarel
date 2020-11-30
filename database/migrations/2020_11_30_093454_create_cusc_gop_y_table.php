<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscGopYTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_gop_y', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('gy_ma')->autoIncrement();
            $table->dateTime('gy_thoigian')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('gy_noidung');
            $table->unsignedBigInteger('kh_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('kh_trangthai')->default('3');

            $table->foreign('kh_ma')->references('kh_ma')->on('cusc_khach_hang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('cusc_sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_gop_y`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_gop_y');
    }
}
