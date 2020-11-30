<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscKhuyenMaiSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_khuyen_mai_san_pham', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('km_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('m_ma');
            $table->string('kmsp_giatri',50)->default('100;0');
            $table->unsignedTinyInteger('kmsp_trangthai')->default('2');

            $table->primary(['km_ma', 'sp_ma', 'm_ma']);

            $table->foreign('km_ma')->references('km_ma')->on('cusc_khuyen_mai')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('cusc_sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('m_ma')->references('m_ma')->on('cusc_mau')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_khuyen_mai_san_pham`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_khuyen_mai_san_pham');
    }
}
