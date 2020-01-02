<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Stock;
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

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'quantity' => $faker->randomDigit(1, 50),
        'product_id' => $faker->randomDigit(1, 10)
    ];
});
