<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMangaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_manga', function (Blueprint $table) {
            $table->smallIncrements('id_detail_manga');
            $table->string('judul_indo');
            $table->enum('jenis_manga', ['Manga', 'Manhua', 'Manhwa']);
            $table->string('konsep_cerita');
            $table->string('komikus');
            $table->enum('status_manga', ['Progress', 'Ongoing', 'End']);
            $table->enum('rate_umur', ['10', '13', '15', '17']);
            $table->text('sinopsis');

            // RELASI TABEL
            $table->unsignedSmallInteger('id_manga');
            $table->foreign('id_manga')->references('id_manga')->on('manga');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_manga');
    }
}
