<?php

use App\Models\Location;
use App\Models\State;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
    $sex = $faker->randomElement(['MALE', 'FEMALE']);
    $state = State::all()->random();
    $location = Location::all()->random();
    return [
        'first_name' => $faker->firstName(strtolower($sex)),
        'middle_name' => $faker->firstName(strtolower($sex)),
        'last_name' => $faker->lastName,
        'sex' => $sex,
        'phone' => '1-00-11',
        'dob' => $faker->dateTimeBetween(),
        'state_id' => $state->id,
        'location_id' => $location->id,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'address' => $faker->address,
        'city' => $faker->city,
        'is_active' => 'ACTIVE',
        'remember_token' => Str::random(10),
        'userable_id' => 0,
        'userable_type' => 0
    ];
});
