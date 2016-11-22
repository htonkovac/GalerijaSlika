<?php

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('p'),
        'last_uploaded_at' =>$faker->dateTimeThisYear,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {

    return [
    'filename' => 'image ('.$faker->numberBetween(1,77).').jpg',
    'caption' => $faker->sentence,
    'user_id' => $faker->numberBetween(1,15),
    'visibility' =>($faker->numberBetween(0,9))?'1':'0',
    ];
});