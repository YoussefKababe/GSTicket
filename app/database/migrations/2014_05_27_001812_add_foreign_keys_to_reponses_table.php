<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToReponsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reponses', function(Blueprint $table)
		{
			$table->integer('utilisateur_id')->unsigned();
			$table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
			$table->integer('ticket_id')->unsigned();
			$table->foreign('ticket_id')->references('id')->on('tickets');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reponses', function(Blueprint $table)
		{
			$table->dropForeign('reponses_utilisateur_id_foreign');
			$table->dropForeign('reponses_ticket_id_foreign');
			$table->dropColumn('utilisateur_id', 'ticket_id');
		});
	}

}
