<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorCursoRelacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('ProfesorCursoRelacion', function(Blueprint $table)
        {
            $table->integer('prof_id')->unsigned();
            $table->integer('curso_id')->unsigned();
            $keys = array('prof_id', 'curso_id');
            $table->primary($keys);
            $table->foreign('prof_id')->references('prof_id')->on('Profesor');
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
        Schema::drop('ProfesorCursoRelacion');
	}

}
