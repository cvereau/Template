<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoDocumentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('TipoDocumento', function(Blueprint $table)
        {
            $table->increments('tdoc_id');
            $table->string('tdoc_nombre','50');
            $table->string('tdoc_descripcion','250');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('TipoDocumento');
	}

}
