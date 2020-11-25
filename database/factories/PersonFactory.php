<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Identification;
use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'type' => $faker->randomElement(['Cliente','Proveedor']),
        'numDoc' => $faker->unique()->dni(),
        'identification_id' => Identification::all()->random()->id
    ];
});
