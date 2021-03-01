<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Lesson;
use App\Standard;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Lesson::class, function (Faker $faker) {

    return [
        'name' => $faker->lexify('Lesson Name'),
        'subject' => 'Math',
        'gradeLevel' => $faker->numberBetween(1, 8)
    ];
});
