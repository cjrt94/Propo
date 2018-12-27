<?php

use Faker\Generator as Faker;

$factory->define(\Propo\Product::class, function (Faker $faker) {
    return [
        'description' => $faker->text(10),
        'sku' => $faker->swiftBicNumber,
        'category' => $faker->word(3,true),
    ];
});
