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
// faker  数据填充的开源库
$factory->define(App\Post::class,function(Faker\Generator $faker){
    return [
        // 'title'=>$faker->sentence(8),
        // 'content'=>$faker->paragraph(10),
        'title' => $faker->sentence(6, true),
        'content' => $faker->text(500)
    ];
});
