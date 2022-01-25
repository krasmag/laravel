<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AdminPanel;
use Faker\Generator as Faker;

$factory->define(AdminPanel::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'company' => $faker->company(),
        'email' => $faker->email,
        'phone' => $faker->e164PhoneNumber,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
