<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTelefonoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('AlumnoTelefono', function(Blueprint $table)
        {
            $table->string('telf_num','20');
            $table->integer('alu_id')->unsigned();
            $table->string('telf_tipo','50');
            $table->string('telf_operadora','20');
            $table->primary('telf_num');
            $table->foreign('alu_id')->references('alu_id')->on('Alumno');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('AlumnoTelefono');
	}

}
