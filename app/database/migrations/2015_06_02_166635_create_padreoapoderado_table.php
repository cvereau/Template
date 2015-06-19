<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadreOApoderadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('PadreOApoderado', function(Blueprint $table)
        {
            $table->increments('pa_id');
            $table->string('pa_nonbres','100');
            $table->string('pa_apellido_paterno','100');
            $table->string('pa_sexo','1');
            $table->string('pa_estado_civil','1');
            $table->datetime('pa_fecha_nac');
            $table->string('pa_dni','20');
            $table->string('pa_departamento','100');
            $table->string('pa_provincia','100');
            $table->string('pa_distrito','100');
            $table->string('pa_direccion','200');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('PadreOApoderado');
	}

}
