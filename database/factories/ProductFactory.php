<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'price' => $faker->numberBetween(1000 , 999999),
        'amount' => $faker->randomDigit
    ];
});
