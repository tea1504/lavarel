<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscVanChuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_van_chuyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('vc_ma')->autoIncrement();
            $table->string('vc_ten', 200);
            $table->unsignedInteger('vc_chiphi')->default('0');
            $table->text('vc_diengiai');
            $table->timestamp('vc_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('vc_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('vc_trangthai')->default('2');

            $table->unique('vc_ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_van_chuyen');
    }
}
