<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$timmy							= new User;
		$timmy->email 			= 'ttester@laravel.io';
		$timmy->password		= Hash::make('password');
		$timmy->first_name	= 'Timmy';
		$timmy->last_name		= 'Tester';
		$timmy->save();

		$faker = Faker\Factory::create();

		foreach(range(1, 4) as $index) {
			$user 						= new User;
			$user->email 			= $faker->email();
			$user->password		= Hash::make(substr($faker->uuid, -12, 12));
			$user->first_name = $faker->firstName;
			$user->last_name 	= $faker->lastName;
			$user->save();
		}
	}

}
