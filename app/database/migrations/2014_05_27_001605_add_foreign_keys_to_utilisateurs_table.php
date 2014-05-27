<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToUtilisateursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('utilisateurs', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('utilisateurs', function(Blueprint $table)
		{
			$table->dropForeign('utilisateurs_role_id_foreign');
			$table->dropColumn('role_id');
		});
	}

}
