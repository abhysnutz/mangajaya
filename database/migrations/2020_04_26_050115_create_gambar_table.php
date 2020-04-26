<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar', function (Blueprint $table) {
            $table->bigIncrements('id_gambar');
            $table->mediumInteger('nama_gambar');
            $table->string('link_gambar');
            $table->timestamp('updated_at');
            
            //relasi ke tabel manga
            $table->unsignedBigInteger('id_chapter');
            $table->foreign('id_chapter')->references('id_chapter')->on('chapter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar');
    }
}
