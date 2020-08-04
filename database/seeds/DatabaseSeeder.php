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
//         $this->call(UserSeeder::class);
        factory(\App\User::class,20)->create();
        factory(\App\PUsers::class,20)->create();
        factory(\App\Courses::class,20)->create();
        factory(\App\Field::class,20)->create();
        factory(\App\Posts::class,20)->create();
        factory(\App\Resources::class,20)->create();
    }
}
