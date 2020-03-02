<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mentor;
use Faker\Generator as Faker;

$factory->define(Mentor::class, function (Faker $faker) {
    return [

            'name' => $faker->name,
            'contact_info' => $faker->name,
    ];
});
