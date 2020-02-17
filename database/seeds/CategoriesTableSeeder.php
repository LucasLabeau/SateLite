<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

DB::table('categories')->insert([

  'name' => 'Acción',
  'created_at' => now(),
  'updated_at' => now(),

]);

DB::table('categories')->insert([

  'name' => 'Estrategia',
  'created_at' => now(),
  'updated_at' => now(),

]);

DB::table('categories')->insert([

  'name' => 'Deportes',
  'created_at' => now(),
  'updated_at' => now(),

]);

DB::table('categories')->insert([

  'name' => 'Otros',
  'created_at' => now(),
  'updated_at' => now(),

  ]);

  }

}
