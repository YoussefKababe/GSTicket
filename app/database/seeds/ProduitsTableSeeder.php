<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class ProduitsTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();

		Utilisateur::find(3)->produits()->create([
			'nomProduit' => 'Kingston Digital DataTraveler SE9',
			'description' => "Kingston's DataTraveler SE9 USB Flash drive has a stylish metal casing with a large ring so it will attach easily. The small form factor makes it a great accessory for notebooks like Ultrabooks as well as tablets that offer USB ports. Its durable casing lets users securely carry this drive everywhere they go with their new devices."
		]);

		Utilisateur::find(3)->produits()->create([
			'nomProduit' => 'WD My Cloud 4TB Personal Cloud Storage',
			'description' => "With My Cloud, WD's personal cloud storage, you can save everything in one place and access it from anywhere with blazing-fast performance. Get abundant storage without paying monthly fees. And with direct file uploads from your mobile devices, all your important data is safely stored at home on your personal cloud."
		]);

		Utilisateur::find(3)->produits()->create([
			'nomProduit' => 'Seagate Barracuda 3 TB HDD',
			'description' => "Desktop hard drives from Seagate give you with the Power of One. One terabyte per disc technology. One drive platform for every capacity need and every desktop storage application. One hard drive qualification effort. One hard drive platform to choose from. One hard drive with trusted performance, reliability, and simplicity to deliver the lowest total cost of ownership."
		]);

		Utilisateur::find(4)->produits()->create([
			'nomProduit' => 'SanDisk Cruzer 32GB USB 2.0 Flash Drive',
			'description' => "Experience premium, reliable and secure storage with a Cruzer USB flash drive. Protect access to your private files with password protection and file encryption with SanDisk SecureAccess software and get the added protection of secure online backup (up to 2 GB optionally available) offered by YuuWaa. With up to 32 GB of storage, you can count on them to help you store plenty of pictures, videos, and other digital favorites wherever you go."
		]);

		Utilisateur::find(4)->produits()->create([
			'nomProduit' => 'Transcend 1 TB USB 3.0 External Hard Drive',
			'description' => "Featuring blazing fast transfer rates, huge storage capacities and a unique three-layer shock protection system, the StoreJet 25M3 USB 3.0 portable hard drive is an ideal storage device for everyday backup, storage, and file transport."
		]);

		Utilisateur::find(4)->produits()->create([
			'nomProduit' => 'PNY Turbo High Performance USB 3.0 Pen Drive',
			'description' => "Get the most out of the USB 3.0 port on your new computer. Experience USB 3.0 next generation speed performance with transfer speeds up to 10X faster than standard PNY USB 2.0 Flash Drives"
		]);
	}
}