<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscThanhToanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_thanh_toan', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('tt_ma')->autoIncrement();
            $table->string('tt_ten', 200);
            $table->text('tt_diengia');
            $table->timestamp('tt_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tt_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('tt_trangthai')->default('2');

            $table->unique('tt_ten');
        });
        DB::statement("ALTER TABLE `cusc_thanh_toan`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_thanh_toan');
    }
}
