<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscNhaCungCapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_nha_cung_cap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->unsignedSmallInteger('ncc_ma')->autoIncrement();
            $table->string('ncc_ten', 200);
            $table->string('ncc_daidien', 100);
            $table->string('ncc_diachi', 250);
            $table->string('ncc_dienthoai', 11);
            $table->string('ncc_email', 100);
            $table->timestamp('ncc_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ncc_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('ncc_trangthai')->default('2');
            $table->unsignedSmallInteger('xx_ma');

            $table->unique('ncc_ten');
            $table->foreign('xx_ma')
                ->references('xx_ma')->on('cusc_xuat_xu')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_nha_cung_cap`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_nha_cung_cap');
    }
}
