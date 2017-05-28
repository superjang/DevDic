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
use Faker\Factory;

/** @var \Faker\Generator $factory */
$faker = Factory::create('ko_KR');

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// faker Documentation => https://github.com/fzaninotto/Faker
$factory->define(App\Dictionary::class, function () use ($faker) {
    return [
        'keyword' => $this->faker->word(),
        'category' => 'WEB',
        'defined_keyword' => $this->faker->text(),
        'option_link' => $this->faker->url(),
    ];
});
