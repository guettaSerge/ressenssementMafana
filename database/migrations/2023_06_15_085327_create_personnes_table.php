<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('idGenre');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personnes');
    }
}
