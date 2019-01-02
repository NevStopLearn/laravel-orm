<?php

use Faker\Generator as Faker;

$factory->define(App\Paper::class, function (Faker $faker) {
    return [
        'title'     => $faker->sentence,
        'user_id'   => \App\User::all()->random()->id,
    ];
});
