<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ApplicationsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);


    }
}

// INTENTOS FALLIDOS DE FACTORY
//factory(App\Application::class, 10)->create();
//factory(App\Order::class, 3)->create();
//factory(App\Comment::class, 3)->create();
