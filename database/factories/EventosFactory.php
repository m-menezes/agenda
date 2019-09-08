<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Eventos::class, function (Faker $faker) {
    // Possiveis valores para o status
    $status = ['andamento','encerrado'];

    return [
        'titulo' => $faker->name,
        'descricao' => $faker->text(100),
        'responsavel' => User::all()->random()->id,
        'status' => $status[rand(0,1)],
        'data_inicio' => $faker->date(),
        'data_prazo' => $faker->date(),
        'data_conclusao' => $faker->date(),
    ];
});
