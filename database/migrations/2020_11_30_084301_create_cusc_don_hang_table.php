<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_don_hang', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('dh_ma')->autoIncrement();
            $table->unsignedBigInteger('kh_ma');
            $table->dateTime('dh_thoigiandathang')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dh_thoigiannhanhang');
            $table->string('dh_nguoinhan', 100);
            $table->string('dh_diachi', 250);
            $table->string('dh_dienthoai', 11);
            $table->string('dh_nguoigui', 100);
            $table->text('dh_loichuc')->nullable();
            $table->unsignedTinyInteger('dh_thanhtoan')->default('0');
            $table->unsignedTinyInteger('nv_xuly')->default('1');
            $table->dateTime('dh_ngayxuly')->nullable()->default(NULL);
            $table->unsignedTinyInteger('nv_giaohang')->default('1');
            $table->dateTime('dh_ngaylapphieugiao')->nullable()->default(NULL);
            $table->dateTime('dh_ngaygiaohang')->nullable()->default(NULL);
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('dh_trangThai')->default('2');
            $table->unsignedTinyInteger('vc_ma');
            $table->unsignedTinyInteger('tt_ma');

            $table->foreign('kh_ma')->references('kh_ma')->on('cusc_khach_hang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_xuly')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_giaohang')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('vc_ma')->references('vc_ma')->on('cusc_van_chuyen')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tt_ma')->references('tt_ma')->on('cusc_thanh_toan')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_don_hang`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_don_hang');
    }
}
