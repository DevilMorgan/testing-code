<?php

use Faker\Generator as Faker;

$factory->define(App\Providers::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'label' => $faker->hexColor,
        'website' => 'http://' . $faker->unique()->domainName,
        'user_id' => factory(App\User::class)->make()
    ];
});
