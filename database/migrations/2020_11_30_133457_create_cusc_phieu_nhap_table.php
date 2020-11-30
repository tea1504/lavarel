<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscPhieuNhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_phieu_nhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('pn_ma')->autoIncrement();
            $table->string('pn_nguoigiao',100);
            $table->string('pn_sohoadon',15);
            $table->dateTime('pn_ngayxuathoadon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('pn_ghichu')->nullable()->default(NULL);
            $table->unsignedTinyInteger('nv_nguoilapphieu');
            $table->dateTime('pn_ngaylapphieu')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('nv_ketoan')->default('1');
            $table->dateTime('pn_ngayxacnhan')->nullable()->default(NULL);
            $table->unsignedTinyInteger('nv_thukho')->default('1');
            $table->dateTime('pn_ngaynhapkho')->nullable()->default(NULL);
            $table->timestamp('pn_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('pn_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('pn_trangThai')->default('2');
            $table->unsignedSmallInteger('ncc_ma');

            $table->unique('pn_sohoadon');

            $table->foreign('nv_nguoilapphieu')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_ketoan')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_thukho')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ncc_ma')->references('ncc_ma')->on('cusc_nha_cung_cap')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_phieu_nhap`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_phieu_nhap');
    }
}
