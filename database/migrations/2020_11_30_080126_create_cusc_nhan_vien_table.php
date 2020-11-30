<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscNhanVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_nhan_vien', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->unsignedTinyInteger('nv_ma')->autoIncrement();
            $table->string('nv_taikhoan', 50);
            $table->string('nv_matkhau', 32);
            $table->string('nv_hoten', 100);
            $table->unsignedTinyInteger('nv_gioitinh')->default('1');
            $table->string('nv_email', 100);
            $table->timestamp('nv_ngaysinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nv_diachi',250);
            $table->string('nv_dienthoai', 11);
            $table->timestamp('nv_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('nv_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('nv_trangthai')->default('2');
            $table->unsignedTinyInteger('q_ma');

            $table->unique(['nv_taikhoan', 'nv_email', 'nv_dienthoai']);
            $table->foreign('q_ma')
                ->references('q_ma')->on('cusc_quyen')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_nhan_vien`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_nhan_vien');
    }
}
