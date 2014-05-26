<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
			Role::create(['role' => 'admin']);
			Role::create(['role' => 'partenaire']);
			Role::create(['role' => 'client']);
	}
}