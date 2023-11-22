<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'company_uuid' => $faker->unique()->uuid,
        'ativa' => $faker->boolean(true),
        'fantasia' => $faker->unique()->company,
        'social' => $faker->unique()->company,
        'cnpj_cpf' => $faker->unique()
            ->numberBetween($min = 1000000000000, $max = 9999999999000),
        'email' => $faker->unique()->companyEmail,
        'obs' => $faker->text($maxNbChars = 200)
    ];
});
