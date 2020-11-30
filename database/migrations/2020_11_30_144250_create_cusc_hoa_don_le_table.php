<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscHoaDonLeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_hoa_don_le', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('hdl_ma')->autoIncrement();
            $table->string('hdl_nguoimuahang', 100);
            $table->string('hdl_dienthoai', 11);
            $table->string('hdl_diachi', 250);
            $table->unsignedTinyInteger('nv_laphoadon');
            $table->dateTime('hdl_ngayxuathoadon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('dh_ma')->default('1');

            $table->foreign('nv_laphoadon')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dh_ma')->references('dh_ma')->on('cusc_don_hang')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_hoa_don_le`");
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_hoa_don_le');
    }
}
