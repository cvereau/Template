<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('Sede', function(Blueprint $table)
        {
            $table->increments('sede_id');
            $table->string('sede_nombre','100');
            $table->string('sede_responsable','100');
            $table->string('sede_direccion','250');
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
		Schema::drop('Sede');
	}

}
