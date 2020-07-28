<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Professional_experiences::class, function (Faker $faker) {

    $professional_id =  $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt');
    $job_description =  $faker->text($maxNbChars = 200);
    $start_date = $faker->date($format = 'Y-m-d', $max = 'now');
    $finish_date = $faker->date($format = 'Y-m-d', $min = 'now');
    $reason_leave = $faker->text($maxNbChars = 200);
    
    

    return [
       'professional_id' => $professional_id,
        'employer' => $faker->firstNameFemale,
        'position' => $faker->address,
        'job_description' => $job_description,
        'start_date' => $start_date,
        'finish_date' => $finish_date,
        'reason_leave' => $reason_leave,
        'current_work' => $faker->boolean,
    ];
});
