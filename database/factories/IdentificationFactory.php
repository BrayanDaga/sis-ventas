<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Identification;
use Faker\Generator as Faker;

$factory->define(Identification::class, function (Faker $faker) {
    return [
        'name'=> $faker->word(),
        'operation'=> $faker->randomElement(['Persona','Comprobante'])
    ];
});
