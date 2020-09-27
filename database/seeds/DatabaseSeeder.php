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
        factory(\App\Models\User::class,20)->create();
        factory(\App\Models\Admins::class,20)->create();
        factory(\App\Models\Courses::class,20)->create();
        factory(\App\Models\Field::class,20)->create();
        factory(\App\Models\Posts::class,20)->create();
        factory(\App\Models\Resources::class,20)->create();
    }
}
