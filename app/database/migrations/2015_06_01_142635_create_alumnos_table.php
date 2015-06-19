<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('Alumno', function(Blueprint $table)
        {
            $table->increments('alu_id');
            $table->integer('grado_id')->unsigned();
            $table->string('alu_nonbres','100');
            $table->string('alu_apellido_paterno','100');
            $table->string('alu_apellido_materno','100');
            $table->string('alu_sexo','1');
            $table->datetime('alu_fecha_nac');
            $table->string('alu_dni','20');
            $table->string('alu_departamento','100');
            $table->string('alu_provincia','100');
            $table->string('alu_distrito','100');
            $table->string('alu_direccion','200');
            $table->string('alu_religion','100');
            $table->integer('alu_numero_hermanos');
            $table->string('alu_tipo_sangre','50');
            $table->boolean('alu_active')->default(1);
            $table->boolean('alu_saltar_impedimentos')->default(0);
            $table->integer('doc_id')->unsigned();
            $table->integer('obs_id')->unsigned();
            $table->timestamps();
            $table->foreign('grado_id')->references('grado_id')->on('Grado');
            $table->foreign('doc_id')->references('doc_id')->on('Documento');
            $table->foreign('obs_id')->references('obs_id')->on('Observacion');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('Alumno');
	}

}
