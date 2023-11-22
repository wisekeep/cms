<?php

use App\Companie;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Companie::class, function (Faker $faker) {
    return [
        //'companie_uuid' => $faker
        'companies_nome_fantasia' => $faker->name,
        'companie_razao_social' => $faker->userName,
        'companie_insc_cnpj_cpf' =>
        $faker->unique()
            ->numberBetween($min = 1000000000, $max = 9999999999),
        'companie_obs' => $faker->text(),
    ];
});
