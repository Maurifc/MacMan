<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Cliente
$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'observacao' => $faker->text()
    ];
});

//Licenca
$factory->define(App\Licenca::class, function(Faker\Generator $faker){
  return [
    'cliente_id' => factory(App\Cliente::class)->create()->cliente_id,
    'nome_software' =>  $faker->word,
    'chave' =>  '00000-00000-00000-00000-00000',
    'login' =>  $faker->word,
    'senha' =>  bcrypt('123456'),
    'data_expiracao' =>  $faker->dateTimeThisYear->format('Y-m-d'),
    'qnt_ativacoes' =>  rand(1, 20),
  ];
});
