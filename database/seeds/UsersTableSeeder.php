<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        /** @var Generator $factory */
        $this->faker = Factory::create('ko_KR');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);
    }
}
