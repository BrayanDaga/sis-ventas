<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'stock' => $faker->numberBetween(1,10),
        'description' => $faker->sentence(),
        'status' => $faker->randomElement(['disponible','no disponible']),
        'category_id' => Category::all()->random()->id,
    ];
});
