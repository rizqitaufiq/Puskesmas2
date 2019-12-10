<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notif', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_puskesmas')->nullable();
            $table->string('id_program')->nullable();
            $table->string('id_indikator')->nullable();
            $table->string('dibaca')->->nullable();
            $table->string('tahun')->nullable();
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
        Schema::dropIfExists('notif');
    }
}
