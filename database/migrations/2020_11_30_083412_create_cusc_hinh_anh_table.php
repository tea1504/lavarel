<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscHinhAnhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_hinh_anh', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('ha_stt')->default('1');
            $table->string('ha_ten',150);

            $table->primary(['ha_stt', 'ha_ten']);
            $table->foreign('sp_ma')->references('sp_ma')->on('cusc_sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_hinh_anh`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_hinh_anh');
    }
}
