<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinTucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TinTuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TieuDe');
            $table->string('TieuDeKhongDau');
            $table->text('TomTat');
            $table->longText('NoiDung');
            $table->string('Hinh');
            $table->integer('NoiBat')->default(0);
            $table->bigInteger('SoLuotXem')->default(0);
            $table->bigInteger('idLoaiTin')->unsigned();
            $table->foreign('idLoaiTin')->references('id')->on('LoaiTin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TinTuc');
    }
}
