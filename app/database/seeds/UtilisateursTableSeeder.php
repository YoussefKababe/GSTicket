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
			'photo' => 'UOrQlNUync264VDJvtQway3hfB8wvvBPaYlv6RMW.jpg',
			'nomUtilisateur' => 'YoussefKababe',
			'motDePasse' => Hash::make('123456'),
			'role_id' => '1'
		]);

		Utilisateur::create([
			'nom' => 'Fahmi',
			'prenom' => 'Salman',
			'email' => 'salman.fahmi@gmail.com',
			'photo' => 'hyeuCjJ9a3I96TrJe4G5nWq6Tdw0fJbNeQ9PbIgf.jpg',
			'nomUtilisateur' => 'SalmanFahmi',
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