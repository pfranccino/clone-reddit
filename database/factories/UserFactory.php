<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Post::class, function (Faker $faker) {
    
    return [
        'title'=>$faker->sentence,
        'description'=>$faker->paragraph,
        'url'=>$faker->url,
        'user_id'=> function (){
            return factory(App\User::class)->create()->id;
        }


           /* Aqui estamos creando elementos para testear la base de datos lo que se esta realizando en la funcion anonima es si no existe un usario en la factory se creara uno para que este relacionado con la publicacion */
    ];
});
