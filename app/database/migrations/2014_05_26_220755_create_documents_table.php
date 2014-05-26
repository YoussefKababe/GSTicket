<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nomDocument');
			$table->integer('ticket_id')->unsigned();
			$table->foreign('ticket_id')->references('id')->on('tickets');
			$table->integer('reponse_id')->unsigned();
			$table->foreign('reponse_id')->references('id')->on('reponses');
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
		Schema::drop('documents');
	}

}
