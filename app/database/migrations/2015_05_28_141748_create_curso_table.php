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
            $table->string('curso_nivel','50');
            $table->integer('curso_numero');
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
