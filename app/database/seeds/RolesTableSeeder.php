<?php


class RolesTableSeeder extends Seeder {

	public function run()
	{
			Role::create(array('role' => 'admin'));
			Role::create(array('role' => 'partenaire'));
			Role::create(array('role' => 'client'));
	}
}