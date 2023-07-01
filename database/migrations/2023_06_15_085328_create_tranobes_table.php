<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTranobesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranobes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id')->nullable();
            $table->string('nom')->nullable();
            $table->integer('idVallee')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tranobes');
    }
}
