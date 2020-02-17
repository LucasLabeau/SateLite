<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

    foreach (range(1,10) as $index) {
        DB::table('applications')->insert([
          'name' => $faker -> sentence(3, true),
          'image_url' => $faker ->imageUrl($width = 640, $height = 480, 'cats') ,
          'description' => $faker -> text($maxNbChars = 200),
          'user_id' => $faker ->numberBetween(1, App\User::count()),
          'category_id' => $faker ->numberBetween(1, App\Category::count()),
          'price' => $faker -> randomFloat(2, 50, 700),
        ]);
    }
}
}
