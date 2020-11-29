<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscXuatXuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_xuat_xu', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedSmallInteger('xx_ma')->autoIncrement();
            $table->string('xx_ten', 100);
            $table->timestamp('xx_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('xx_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('xx_trangthai')->default('2');

            $table->unique('xx_ten');
        });
        DB::statement("ALTER TABLE `cusc_xuat_xu`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_xuat_xu');
    }
}
