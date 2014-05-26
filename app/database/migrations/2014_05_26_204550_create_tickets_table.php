<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
			$table->increments('id');
			$table->text('message');
			$table->string('priorite');
			$table->string('etat');
			$table->integer('probleme_id')->unsigned();
			$table->foreign('probleme_id')->references('id')->on('problemes');
			$table->integer('utilisateur_id')->unsigned();
			$table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
			$table->integer('produit_id')->unsigned();
			$table->foreign('produit_id')->references('id')->on('produits');
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
		Schema::drop('tickets');
	}

}
