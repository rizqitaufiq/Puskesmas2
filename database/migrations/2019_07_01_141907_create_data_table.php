<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_puskesmas');
            $table->string('nama_program');
            $table->string('nama_indikator');
            $table->string('nama_targetumur');
            $table->integer('target_pencapaian');
            $table->integer('pencapaian');
            $table->integer('total_sasaran');
            $table->integer('target_sasaran');
            $table->integer('tahun');
            $table->string('nilai');
            $table->string('adequasi_effort');
            $table->string('adequasi_peformance');
            $table->string('progress');
            $table->string('sensitivitas');
            $table->string('spesifitas');
            $table->string('hasil');
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
        Schema::dropIfExists('data');
    }
}
