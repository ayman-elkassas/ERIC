<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Courses;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Courses::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'desc' => $faker->paragraph,
        'field_name' => $faker->name,
        'type_media' => $faker->name,
        'price' => $faker->numberBetween(100,10000),
        'category_name' => $faker->name,
        'user_id' => rand(1,20),
    ];
});
