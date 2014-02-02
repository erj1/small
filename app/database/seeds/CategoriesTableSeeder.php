<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('categories')->truncate();

		$categories = array(
			array(
				'id'         => 1,
				'name'       => 'Uncategorized',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			)
		);

		// Uncomment the below to run the seeder
		DB::table('categories')->insert($categories);
	}

}
