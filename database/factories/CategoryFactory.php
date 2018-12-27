<?php

use Faker\Generator as Faker;

$factory->define(\Propo\Category::class, function (Faker $faker) {
    return [
        'description' => $faker->word()
    ];
});
