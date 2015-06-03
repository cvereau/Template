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
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('user_id');
            $table->integer('role_id')->unsigned();
            $table->integer('sede_id')->unsigned();
            $table->string('username','50');
            $table->string('password','50');
            $table->string('email','50');
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('sede_id')->references('sede_id')->on('sedes');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
	}

}
