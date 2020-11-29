<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscMauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_mau', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('m_ma')->autoIncrement();
            $table->string('m_ten', 50);
            $table->timestamp('m_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('m_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('m_trangthai')->default('2');

            $table->unique('m_ten');
        });
        DB::statement("ALTER TABLE `cusc_mau`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_mau');
    }
}
