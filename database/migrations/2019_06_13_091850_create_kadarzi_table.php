<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKadarziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kadarzis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('indikator')->nullable();
            $table->string('targetumur')->nullable();
            $table->integer('target_pencapaian')->nullable();
            $table->integer('pencapaian')->nullable();
            $table->integer('total_sasaran')->nullable();
            $table->integer('targer_sasaran')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('nilai')->nullable();
            $table->string('adequasi_effort')->nullable();
            $table->string('adequasi_peformance')->nullable();
            $table->string('progress')->nullable();
            $table->string('sensitivitas')->nullable();
            $table->string('spesifitas')->nullable();
            $table->string('hasil')->nullable();
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
        Schema::dropIfExists('kadarzi');
    }
}
