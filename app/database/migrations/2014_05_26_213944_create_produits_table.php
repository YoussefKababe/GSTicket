<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProduitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produits', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nomProduit')->unique();
			$table->text('description');
			$table->integer('utilisateur_id')->unsigned();
			$table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
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
		Schema::drop('produits');
	}

}
