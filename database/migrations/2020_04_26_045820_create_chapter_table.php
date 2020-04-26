<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter', function (Blueprint $table) {
            $table->bigIncrements('id_chapter');
            $table->decimal('episode_chapter', 5,1);
            $table->string('judul_chapter', 100);
            $table->integer('views')->default(0);
            $table->timestamps();
            
            //relasi ke tabel manga
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
        Schema::dropIfExists('chapter');
    }
}
