<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkdnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skdn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_puskesmas')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('Data_S')->nullable();
            $table->string('Data_K')->nullable();
            $table->string('Data_D')->nullable();
            $table->string('Data_N')->nullable();
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
        Schema::dropIfExists('skdn');
    }
}
