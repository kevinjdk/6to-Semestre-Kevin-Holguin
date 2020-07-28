<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Offer_professional::class, function (Faker $faker) {
  

    $offer_id =  $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt');
    $professional_id =  $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt');

    return [
        'offer_id' => $offer_id,
        'professional_id' => $professional_id,
    ];
});
