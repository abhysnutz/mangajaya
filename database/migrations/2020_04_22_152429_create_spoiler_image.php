<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpoilerImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spoiler_image', function (Blueprint $table) {
            $table->smallIncrements('id_spoiler_image');
            $table->tinyInteger('nomor_spoiler_image');
            $table->string('link_spoiler_image');

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
        Schema::dropIfExists('spoiler_image');
    }
}
