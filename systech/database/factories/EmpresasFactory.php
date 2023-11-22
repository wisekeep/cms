<?php

use App\Models\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        //'uuid' => $faker->unique()->uuid, AUTO uuid_generate_v4() função DEFAULT PostgreSQL
        'ativa' => $faker->boolean(true),
        'fantasia' => $faker->unique()->company,
        'social' => $faker->unique()->company,
        'cnpj_cpf' => $faker->unique()
            ->numberBetween($min = 1000000000000, $max = 9999999999000),
        'email' => $faker->unique()->companyEmail,
        'obs' => $faker->text($maxNbChars = 200)
    ];
});
