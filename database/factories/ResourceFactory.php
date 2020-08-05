<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resources;
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

$factory->define(Resources::class, function (Faker $faker) {
    return [
        'file_name' => $faker->name,
        'file_path' => $faker->imageUrl(),
        'field_name' => $faker->name,
        'size' => rand(1,100),
        'user_id' => rand(1,20),
        'field_id' => rand(1,20),
    ];
});
