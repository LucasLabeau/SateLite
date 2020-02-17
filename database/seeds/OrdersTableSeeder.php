<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

    foreach (range(1,3) as $index) {
        DB::table('orders')->insert([
          'user_id' => $faker -> unique()->numberBetween(1, App\User::count()),
          'application_id' => $faker -> unique()->numberBetween(1, App\Application::count()),
          'price' => rand(1, 10),
        ]);
      }
    }
}
