<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Detailpurchase;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Detailpurchase::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'quantity' => $faker->numberBetween(1,5),
    ];
});
