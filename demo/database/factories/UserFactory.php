<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name'=>$faker->name,
        'password' => $password ?: $password = bcrypt('123'),
        'email'=>$faker->unique()->safeEmail
    ];
});