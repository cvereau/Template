<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadreTelefonoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('PadreOApoderadoTelefono', function(Blueprint $table)
        {
            $table->string('telf_num','20');
            $table->integer('pa_id')->unsigned();
            $table->string('telf_tipo','50');
            $table->string('telf_operadora','20');
            $table->primary('telf_num');
            $table->foreign('pa_id')->references('pa_id')->on('PadreOApoderado');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('PadreOApoderadoTelefono');
	}

}
