<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('Profesor', function(Blueprint $table)
        {
            $table->increments('prof_id');
            $table->integer('usr_id')->unsigned();
            $table->string('prof_dni','100');
            $table->string('prof_nombre','100');
            $table->string('prof_apellido_paterno','100');
            $table->string('prof_apellido_materno','100');
            $table->string('prof_sexo','1');
            $table->string('prof_direccion','200');
            $table->string('prof_telefono','50');
            $table->datetime('prof_fecha_nac');
            $table->boolean('prof_esTutor')->default(0);
            $table->string('prof_esTutor_aula','10');
            $table->timestamps();
            $table->foreign('usr_id')->references('usr_id')->on('Usuario');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('Profesor');
	}

}
