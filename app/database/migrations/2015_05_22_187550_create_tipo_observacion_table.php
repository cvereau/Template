<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoObservacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('TipoObservacion', function(Blueprint $table)
        {
            $table->increments('tobs_id');
            $table->string('tobs_nombre','50');
            $table->string('tobs_descripcion','250');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('TipoObservacion');
	}

}
