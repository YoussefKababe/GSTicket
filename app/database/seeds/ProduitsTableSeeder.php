<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProduitsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Utilisateur::find(3)->produits()->create([
				'nomProduit' => $faker->sentence($nbWords = 2),
				'description' => $faker->sentence($nbWords = 6)
			]);
		}
	}

}