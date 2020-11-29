<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscKhachHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_khach_hang', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('kh_ma')->autoIncrement();
            $table->string('kh_taikhoan', 50);
            $table->string('kh_matkhau', 32);
            $table->string('kh_hoten', 100);
            $table->unsignedTinyInteger('kh_gioitinh')->default('1');
            $table->string('kh_email',100);
            $table->dateTime('kh_ngaysinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('kh_diachi', 250)->nullable()->default('NULL');
            $table->string('kh_dienthoai', 11)->nullable()->default('NULL');
            $table->timestamp('kh_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kh_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('kh_trangthai')->default('3');

            $table->unique(['kh_taiKhoan', 'kh_email', 'kh_dienThoai']);
        });
        DB::statement("ALTER TABLE `cusc_khach_hang` comment 'Khách hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_khach_hang');
    }
}
