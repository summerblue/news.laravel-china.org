<?php

use App\Models\User;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'avatar' => '',
        'remember_token' => str_random(10),
        'created_at'           => Carbon::now()->toDateTimeString(),
        'updated_at'           => Carbon::now()->toDateTimeString(),
    ];
});
