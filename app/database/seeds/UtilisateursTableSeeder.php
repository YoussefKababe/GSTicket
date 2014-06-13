<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UtilisateursTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Utilisateur::create([
			'nom' => 'Kababe',
			'prenom' => 'Youssef',
			'email' => 'youssef.kbe@gmail.com',
			'photo' => 'default.png',
			'nomUtilisateur' => 'Youssef Kababe',
			'motDePasse' => Hash::make('123456'),
			'role_id' => '1'
		]);

		Utilisateur::create([
			'nom' => 'Fahmi',
			'prenom' => 'Salman',
			'email' => 'salman.fahmi@gmail.com',
			'photo' => 'default.png',
			'nomUtilisateur' => 'Salman Fahmi',
			'motDePasse' => Hash::make('123456'),
			'role_id' => '1'
		]);

		foreach(range(1, 10) as $index)
		{
			Utilisateur::create([
				'nom' => $faker->lastName,
				'prenom' => $faker->firstName,
				'email' => $faker->email,
				'nomUtilisateur' => $faker->userName,
				'photo' => 'default.png',
				'motDePasse' => Hash::make('123456'),
				'role_id' => '2'
			]);

			Utilisateur::create([
				'nom' => $faker->lastName,
				'prenom' => $faker->firstName,
				'email' => $faker->email,
				'nomUtilisateur' => $faker->userName,
				'photo' => 'default.png',
				'motDePasse' => Hash::make('123456'),
				'role_id' => '3'
			]);
		}
	}

}