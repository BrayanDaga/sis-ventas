<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use App\Purchase;
use App\User;
use Faker\Generator as Faker;

$factory->define(Purchase::class, function (Faker $faker) {
    return [
        'provider_id' => Provider::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'type_vou' => $faker->randomElement(['ticker','boleta','factura']),
        'iva' => 1.8,
        'total' => 20,
    ];
});
