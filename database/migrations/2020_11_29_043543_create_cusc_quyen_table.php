<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('q_ma')->autoIncrement();
            $table->string('q_ten', 30);
            $table->string('q_diengiai', 250)->nullable();
            $table->timestamp('q_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('q_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('q_trangthai')->default('2');

            $table->unique('q_ten');
        });
        DB::statement("ALTER TABLE `cusc_quyen`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_quyen');
    }
}
