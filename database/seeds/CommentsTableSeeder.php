<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

    foreach (range(1,20) as $index) {
        DB::table('comments')->insert([
          'order_id' => $faker->numberBetween(1, App\Order::count()),
          'rating' => $faker -> numberBetween(1, 5),
          'content' => $faker -> text($maxNbChars = 200),
        ]);
    }
}
}
