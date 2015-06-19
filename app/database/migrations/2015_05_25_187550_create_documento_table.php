<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('Documento', function(Blueprint $table)
        {
            $table->increments('doc_id');
            $table->integer('doc_tipo_documento')->unsigned();
            $table->string('doc_nombre_doc','100');
            $table->string('doc_url_archivo','250');
            $table->timestamps();
            $table->foreign('doc_tipo_documento')->references('tdoc_id')->on('TipoDocumento');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('Documento');
	}

}
