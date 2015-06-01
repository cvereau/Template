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
        if (!Schema::hasTable('sedes'))
        {
            Schema::create('sedes', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('name','50');
                $table->string('responsible','50');
                $table->string('location','100');
                $table->timestamps();
            });
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sedes');
	}

}
