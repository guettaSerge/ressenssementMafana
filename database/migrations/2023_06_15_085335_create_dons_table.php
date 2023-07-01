<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id')->nullable();
            $table->string('nom')->nullable();
            $table->integer('idCategDon')->nullable();
            $table->integer('nivVulnerabilite')->nullable();
            $table->string('minage');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dons');
    }
}
