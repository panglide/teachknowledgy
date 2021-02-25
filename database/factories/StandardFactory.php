<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Standard;
use Faker\Generator as Faker;

$factory->define(Standard::class, function (Faker $faker) {
    return [
        'name' => $faker->regexify('[1-8]\.[A-Z]{1,3}\.[A-Z]{1}\.[1-9]\d'),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'subject' => 'Math',
        'gradeLevel' => '3'
    ];
});
