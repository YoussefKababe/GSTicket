<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationUtilisateurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification_utilisateur', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('utilisateur_id')->unsigned();
			$table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
			$table->integer('notification_id')->unsigned();
			$table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
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
		Schema::drop('notification_utilisateur');
	}

}
