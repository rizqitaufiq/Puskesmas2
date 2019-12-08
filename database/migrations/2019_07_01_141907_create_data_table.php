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
            $table->string('nama_puskesmas')->nullable();;
            $table->string('nama_program')->nullable();;
            $table->string('nama_indikator')->nullable();;
            $table->string('nama_targetumur')->nullable();;
            $table->string('cakupan')->nullable();;
            $table->string('pencapaian')->nullable();;
            $table->string('total_sasaran')->nullable();;
            $table->string('target')->nullable();;
            $table->integer('tahun')->nullable();;
            $table->string('adequasi_effort')->nullable();;
            $table->string('adequasi_peformance')->nullable();;
            $table->string('progress')->nullable();;
            $table->string('sensitivitas')->nullable();;
            $table->string('spesifitas')->nullable();;
            $table->string('hasil')->nullable();;
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
