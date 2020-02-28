<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([

        'name' => 'Juancito',
        'email' => 'juancito@tuvieja.com',
        'email_verified_at' => now(),
        'isDev' => 1,
        'password' => Hash::make('LaravelSucks'), // password
        'remember_token' => Str::random(10),

      ]);

      DB::table('users')->insert([

        'name' => 'Solange',
        'email' => 'solange@callefalsa.com',
        'isDev' => 1,
        'email_verified_at' => now(),
        'password' => Hash::make('LaravelSucks'), // password
        'remember_token' => Str::random(10),

      ]);

      DB::table('users')->insert([

        'name' => 'Santiago',
        'email' => 'santiago@trump.com',
        'isDev' => 0,
        'email_verified_at' => now(),
        'password' => Hash::make('LaravelSucks'), // password
        'remember_token' => Str::random(10),

      ]);
    }
}
