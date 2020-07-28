<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Professional_references::class, function (Faker $faker) {

    $company_id =  $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt');
    $professional_id =  $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt');

    return [
        'company_id' => $company_id,
        'professional_id' => $professional_id,
    ];
});
