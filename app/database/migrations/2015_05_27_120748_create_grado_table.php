<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Grado', function(Blueprint $table)
		{
            $table->increments('grado_id');
            $table->integer('sede_id')->unsigned();
            $table->integer('grado_numero');
            $table->string('grado_nivel','50');
            $table->string('grado_seccion','1');
            $table->string('grado_nro_aula','10');
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
        Schema::drop('Grado');
	}

}
