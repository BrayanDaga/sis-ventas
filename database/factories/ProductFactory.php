<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $filename = $faker->numberBetween(1,10). '.jpg';
    return [
        'name' => $faker->word(),
        'stock' => $faker->numberBetween(1,10),
        'description' => $faker->sentence(),
        'status' => $faker->randomElement(['inactivo','activo']),
        'category_id' => Category::all()->random()->id,
        'price' => $faker->randomFloat(2,10,1000),
        'image' => "img/products/{$filename}",
    ];
});
