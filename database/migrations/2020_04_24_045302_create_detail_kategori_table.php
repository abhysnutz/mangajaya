<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kategori', function (Blueprint $table) {
            $table->mediumIncrements('id_detail_kategori');

            // RELASI TABEL 
            // RELASI TABEL MANGA
            $table->unsignedSmallInteger('id_manga');
            $table->foreign('id_manga')->references('id_manga')->on('manga');

            // RELASI TABEL KATEGORI
            $table->unsignedSmallInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_kategori');
    }
}
