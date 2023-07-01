<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePereFamillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pere_familles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id')->nullable();
            $table->string('nom')->nullable();
            $table->date('dateAdmission')->nullable();
            $table->integer('idDomicile')->nullable();
            $table->integer('idProfession')->nullable();
            $table->integer('idTranobe')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pere_familles');
    }
}
