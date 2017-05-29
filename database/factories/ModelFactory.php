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
        'nombre' => $faker->name,
        'apellido' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Banco::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'logo' => $faker->imageUrl(),
        'web' => $faker->url,
        'telefonos' => $faker->phoneNumber,
        'puntuacion' => str_random(3)
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Servicio::class, function (Faker\Generator $faker) {
    return [
        'servicio' => $faker->name,
        'descripcion' => $faker->text
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Parametro::class, function (Faker\Generator $faker) {
   // $servicios_ids = \DB::table('servicios')->select('id')->get();
    return [
        'parametro' => $faker->name,
        'unidad' => $faker->text,
     //   'servicio_id' => $faker->randomElement($servicios_ids)->id  
    ];
});

