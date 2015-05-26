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
			$table->increments('id');
            $table->integer('role_id')->unsigned();;
            $table->string('username','50');
            $table->string('password','50');
            $table->string('email','50');
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
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
