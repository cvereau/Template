<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('Usuario', function(Blueprint $table)
        {
            $table->increments('usr_id');
            $table->integer('rol_id')->unsigned();
            $table->integer('sede_id')->unsigned();
            $table->string('usr_username','50');
            $table->string('usr_password','50');
            $table->string('usr_email','50');
            $table->boolean('usr_active')->default(1);
            $table->timestamps();
            $table->foreign('rol_id')->references('rol_id')->on('Rol');
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
        Schema::drop('Usuario');
	}

}
