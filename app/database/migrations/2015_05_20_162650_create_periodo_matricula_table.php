<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoMatriculaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('PeriodoMatricula', function(Blueprint $table)
        {
            $table->increments('pm_id');
            $table->integer('sede_id')->unsigned();
            $table->integer('pm_anio');
            $table->datetime('pi_inicio');
            $table->datetime('pi_fin');
            $table->foreign('sede_id')->references('sede_id')->on('Sede');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('PeriodoMatricula');
	}

}
