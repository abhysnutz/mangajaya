<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other', function (Blueprint $table) {
            $table->smallIncrements('id_other_manga');
            $table->boolean('berwarna')->default(0);
            $table->boolean('rekomendasi')->default(0);
            $table->boolean('hot')->default(0);

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
        Schema::dropIfExists('other');
    }
}
