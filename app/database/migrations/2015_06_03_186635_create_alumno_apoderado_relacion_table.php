<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoApoderadoRelacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('AlumnoApoderadoRelacion', function(Blueprint $table)
        {
            $table->integer('alu_id')->unsigned();
            $table->integer('pa_id')->unsigned();
            $keys = array('alu_id', 'pa_id');
            $table->primary($keys);
            $table->foreign('alu_id')->references('alu_id')->on('Alumno');
            $table->foreign('pa_id')->references('pa_id')->on('PadreOApoderado');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('AlumnoApoderadoRelacion');
	}

}
