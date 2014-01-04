<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('posts')->truncate();

		$faker = Faker\Factory::create();

		foreach(range(1, 30) as $index) {
			Post::create(array(
				'title'					=> $this->title(),
				'author'				=> $faker->randomNumber(1, 5),
				'content'				=> $faker->paragraph(20),
				'published_at'	=> $faker->dateTimeBetween('-2 years', 'now'),
				));
		}

		// Uncomment the below to run the seeder
		// DB::table('posts')->insert($posts);
	}

	private function title()
	{
		$faker = Faker\Factory::create();
		$sentence = $faker->sentence($faker->randomNumber(2, 5));
		return substr($sentence, 0, strlen($sentence) - 1);
	}

}
