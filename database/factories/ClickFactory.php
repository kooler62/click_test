<?php

use Faker\Generator as Faker;
use App\Click;
$factory->define(Click::class, function (Faker $faker) {
    return [
        'uid' => $faker->numberBetween(0,2147483674),
        'user_agent' => $faker->randomElement(['Mozilla', 'Opera', 'Chrome']) . " " . $faker->sentence(),
        'ip' => $faker->ipv4(),
        'referer' => $faker->url(),
        'param1' => $faker->word(),
        'param2' => $faker->word(),
        'errors' => $faker->numberBetween(0,1000),
        'bad_domains' => $faker->numberBetween(0,1000),
    ];
});
