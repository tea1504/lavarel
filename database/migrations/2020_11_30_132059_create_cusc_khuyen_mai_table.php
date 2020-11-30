<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscKhuyenMaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_khuyen_mai', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('km_ma')->autoIncrement();
            $table->string('km_ten', 200);
            $table->text('km_noidung');
            $table->dateTime('km_batdau');
            $table->dateTime('km_ketthuc')->nullable()->default(NULL);
            $table->string('km_giatri', 50)->default('100;100');
            $table->unsignedTinyInteger('nv_nguoilap');
            $table->dateTime('km_ngaylap')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('nv_kynhay')->default('1');
            $table->dateTime('km_ngaykynhay')->default(NULL);
            $table->unsignedTinyInteger('nv_kyduyet')->default('1');
            $table->dateTime('km_ngayduyet')->nullable()->default(NULL);
            $table->timestamp('km_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('km_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('km_trangThai')->default('2');

            $table->foreign('nv_nguoilap')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_kynhay')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_kyduyet')->references('nv_ma')->on('cusc_nhan_vien')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_khuyen_mai`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_khuyen_mai');
    }
}
