<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Curso', function(Blueprint $table)
		{
            $table->increments('curso_id');
            $table->string('curso_nombre','100');
            $table->integer('grado_id')->unsigned();
            $table->foreign('grado_id')->references('grado_id')->on('Grado');
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
