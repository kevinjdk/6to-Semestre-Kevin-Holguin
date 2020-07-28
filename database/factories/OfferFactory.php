<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Offer::class, function (Faker $faker) {

    $company_id =  $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt');
    $contract_type = $faker->bothify('Contrato ##??');
    $experience_time = $faker->numerify('### Horas');
    $remuneration = $faker->numerify('### $');
    $working_day = $faker->date($format = 'Y-m-d', $max = 'now');
    $start_date = $faker->date($format = 'Y-m-d', $max = 'now');
    $finish_date = $faker->date($format = 'Y-m-d', $min = 'now');
    $activities = $faker->text($maxNbChars = 200);
    $aditional_information = $faker->text($maxNbChars = 200);

    return [
        'company_id' => $company_id,
        'code' => $faker->isbn13,
        'contact' => $faker->e164PhoneNumber,
        'email' => $faker->freeEmail,
        'phone' => $faker->tollFreePhoneNumber,
        'cell_phone' => $faker->phoneNumber,
        'contract_type' => $contract_type,
        'position' => $faker->country,
        'broad_field' => $faker->citySuffix,
        'specific_field' => $faker->userName,
        'training_hours' => $faker->buildingNumber,
        'experience_time' =>$experience_time,
        'remuneration' => $remuneration,
        'working_day' => $working_day,
        'number_jobs' => $faker->randomDigit,
        'start_date' => $start_date,
        'finish_date' => $finish_date,
        'activities' => $activities,
        'aditional_information' => $aditional_information,
        'city' => $faker->city,
        'province' => $faker->citySuffix,
    ];
});
