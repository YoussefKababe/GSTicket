<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tickets', function(Blueprint $table)
		{
			$table->integer('probleme_id')->unsigned();
			$table->foreign('probleme_id')->references('id')->on('problemes');
			$table->integer('utilisateur_id')->unsigned();
			$table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
			$table->integer('produit_id')->unsigned();
			$table->foreign('produit_id')->references('id')->on('produits');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tickets', function(Blueprint $table)
		{
			$table->dropColumn('probleme_id', 'utilisateur_id', 'produit_id');
		});
	}

}
