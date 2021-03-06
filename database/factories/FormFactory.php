<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Form;
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

$factory->define(Form::class, function (Faker $faker) {
    return [
        'title'       => $faker->paragraph(1),
        'description' => $faker->paragraph,
        'date'        => $faker->date('Y-m-d', 'now'),
        'start_time'  => $faker->time(),
        'end_time'    => $faker->time(),
        // 'user_id'     => factory(User::class)->create()->id,
        'user_id'     => random_int(1, 3),
        'uuid' => Str::uuid()
    ];
});
