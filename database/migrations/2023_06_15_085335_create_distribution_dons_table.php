<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistributionDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_dons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idPereFamille')->nullable();
            $table->integer('idDon')->nullable();
            $table->date('dateDistribution')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('distribution_dons');
    }
}
