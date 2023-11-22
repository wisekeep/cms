<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        //'user_id' => factory(User::class)->create()->id,
        'user_id' => $faker->unique()->numberBetween($min = 1, $max = 10),
        'profile_uuid' => $faker->uuid,
        //'imagem' => $faker->image('images', 400, 300),
        'imagem' =>  $faker->imageUrl($width = 200, $height = 200),
        'cpf' => $faker->cpf,
        'rg' => $faker->rg,
        'rg_emissor' => $faker->regexify('[A-Za-z0-9]{5}'),
        'data_aviversario' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'email_alternativo' => $faker->companyEmail,
        'endereco' => $faker->streetAddress,
        'numero' => $faker->buildingNumber,
        'bairro' => $faker->citySuffix,
        'cidade' => $faker->city,
        'estado' => $faker->stateAbbr,
        'pais' => 'Brasil',
        'cep' =>  $faker->postcode,
        'fone1' => $faker->cellphone,
        'fone2' => $faker->phone,
        'fone3' => $faker->phone,
        'fone4' => $faker->phone,
        'obs' => $faker->text,
        'file' => $faker->imageUrl($width = 400, $height = 400),
    ];
});
