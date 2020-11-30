<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscHoaDonSiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_hoa_don_si', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('hds_ma')->autoIncrement();
            $table->string('hds_nguoimuahang', 100);
            $table->string('hds_tendonvi', 200);
            $table->string('hds_diachi', 250);
            $table->string('hds_masothue', 14);
            $table->string('hds_sotaikhoan', 20)->nullable()->default(NULL);
            $table->unsignedTinyInteger('nv_laphoadon');
            $table->dateTime('hds_ngayxuathoadon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('nv_thutruong')->default('1');
            $table->timestamp('hds_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('hds_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('hds_trangThai')->default('1');
            $table->unsignedBigInteger('dh_ma')->default('1');
            $table->unsignedTinyInteger('tt_ma');

            $table->foreign('nv_laphoadon')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_thutruong')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dh_ma')->references('dh_ma')->on('cusc_don_hang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tt_ma')->references('tt_ma')->on('cusc_thanh_toan')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_hoa_don_si`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_hoa_don_si');
    }
}
