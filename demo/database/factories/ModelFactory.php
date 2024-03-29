<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence(mt_rand(3,10)),
        'content' => join("\n\n",$faker->paragraphs(mt_rand(3,6))),
        'published_at' => $faker->dateTimeBetween('-1 month','+3 days'),

    ];
});
