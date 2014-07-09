<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class UtilisateursTableSeeder extends Seeder {

	public function run()
	{

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

		Utilisateur::create([
			'nom' => 'Raki',
			'prenom' => 'Abderrahmane',
			'email' => 'abderrahmane.raki@gmail.com',
			'photo' => '0BYN2fFF2PoShZcTcAR60PbUJ8W3EsDwqrLFEHNy.jpg',
			'nomUtilisateur' => 'AbderrahmaneRaki',
			'motDePasse' => Hash::make('123456'),
			'role_id' => '2'
		]);

		Utilisateur::create([
			'nom' => 'Moumou',
			'prenom' => 'Kawtar',
			'email' => 'kawtar.moumou@gmail.com',
			'photo' => 'MLEDf1AQGKXR6c9AAKgJSUee0DdLgilbcLnVK1B4.jpg',
			'nomUtilisateur' => 'KawtarMoumou',
			'motDePasse' => Hash::make('123456'),
			'role_id' => '2'
		]);

		Utilisateur::create([
			'nom' => 'Mohamed',
			'prenom' => 'Berbich',
			'email' => 'mohamed.berbich@gmail.com',
			'photo' => '4rDIDVQlp8zAbYMANNXFW2PladhWGdfcwx00pY2X.jpg',
			'nomUtilisateur' => 'MohamedBerbich',
			'motDePasse' => Hash::make('123456'),
			'role_id' => '3'
		]);

		Utilisateur::create([
			'nom' => 'Tahiri',
			'prenom' => 'Amine',
			'email' => 'amine.tahiri@gmail.com',
			'photo' => 'default.png',
			'nomUtilisateur' => 'AmineTahiri',
			'motDePasse' => Hash::make('123456'),
			'role_id' => '3'
		]);		
	}

}