<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PUsers;
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

$factory->define(PUsers::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt($faker->password), // password
        'remember_token' => Str::random(10),
        'avatar' => $faker->imageUrl(),
        'phone' => $faker->phoneNumber,
        'skills' => $faker->sentence,
        'fields_follow' => $faker->sentence,
    ];
});
