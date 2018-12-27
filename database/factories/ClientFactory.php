<?php

use Faker\Generator as Faker;

$factory->define(\Propo\Client::class, function (Faker $faker) {
    return [
        'description' => $faker->name,
        'document' => $faker->randomNumber(8),
        'type_document' => $faker->word(1),
        'state' => true,
        'user_id' => 1,

    ];
});
