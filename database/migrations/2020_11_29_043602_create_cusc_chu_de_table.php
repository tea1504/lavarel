<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscChuDeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_chu_de', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('cd_ma')->autoIncrement();
            $table->string('cd_ten', 50);
            $table->timestamp('cd_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cd_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('cd_trangthai')->default('2');

            $table->unique('cd_ten');
        });
        DB::statement("ALTER TABLE `cusc_chu_de`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_chu_de');
    }
}
