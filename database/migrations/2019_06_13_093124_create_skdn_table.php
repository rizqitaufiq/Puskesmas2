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
            $table->integer('S')->nullable();
            $table->integer('K')->nullable();
            $table->integer('D')->nullable();
            $table->integer('N')->nullable();
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
