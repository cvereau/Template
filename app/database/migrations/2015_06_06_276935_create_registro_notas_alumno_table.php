<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroNotasAlumnoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('RegistroNotasPorAlumno', function(Blueprint $table)
        {
            $table->integer('pi_id')->unsigned();
            $table->integer('alu_id')->unsigned();
            $table->integer('curso_id')->unsigned();
            $keys = array('pi_id', 'alu_id','curso_id');
            $table->primary($keys);
            $table->foreign('pi_id')->references('pi_id')->on('PeriodoIngresoNotas');
            $table->foreign('alu_id')->references('alu_id')->on('Alumno');
            $table->foreign('curso_id')->references('curso_id')->on('Curso');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('RegistroNotasPorAlumno');
	}

}
