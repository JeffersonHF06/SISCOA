<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => 87787656,
        'position_id' => random_int(1, 4),
        'career_id' => random_int(1, 7),
        'role_id' => random_int(1, 3),
        'is_active' => true,
        'password' => 'password',
        'remember_token' => Str::random(10),
    ];
});
