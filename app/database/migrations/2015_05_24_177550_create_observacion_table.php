<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('Observacion', function(Blueprint $table)
        {
            $table->increments('obs_id');
            $table->integer('obs_tipo_observacion')->unsigned();
            $table->string('obs_contenido','250');
            $table->timestamps();
            $table->foreign('obs_tipo_observacion')->references('tobs_id')->on('TipoObservacion');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('Observacion');
	}

}
