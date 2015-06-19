<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoIngresoNotasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('PeriodoIngresoNotas', function(Blueprint $table)
        {
            $table->increments('pi_id');
            $table->integer('sede_id')->unsigned();
            $table->string('pi_nombre','100');
            $table->Integer('pi_anio');
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
        Schema::drop('PeriodoIngresoNotas');
	}

}
