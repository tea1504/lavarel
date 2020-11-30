<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscChuDeSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_chu_de_san_pham', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('cd_ma');

            $table->primary(['sp_ma', 'cd_ma']);
            $table->foreign('sp_ma')->references('sp_ma')->on('cusc_sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('cd_ma')->references('cd_ma')->on('cusc_chu_de')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_chu_de_san_pham`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_chu_de_san_pham');
    }
}
