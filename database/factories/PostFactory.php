<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use App\Models\Posts;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    $time = new Carbon($faker->date());

    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(),
        'author_id' => Admin::all()->first()->id,
        'created_at' => $time,
        'updated_at' => $time
    ];
});
