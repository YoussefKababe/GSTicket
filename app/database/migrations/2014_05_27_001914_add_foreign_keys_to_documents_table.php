<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('documents', function(Blueprint $table)
		{
			$table->integer('ticket_id')->unsigned();
			$table->foreign('ticket_id')->references('id')->on('tickets');
			$table->integer('reponse_id')->unsigned();
			$table->foreign('reponse_id')->references('id')->on('reponses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('documents', function(Blueprint $table)
		{
			$table->dropForeign('documents_ticket_id_foreign');
			$table->dropForeign('documents_reponse_id_foreign');
			$table->dropColumn('ticket_id', 'reponse_id');
		});
	}

}
