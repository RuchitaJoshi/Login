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
    return [
        'name' => $faker->name,
        'role_id'=> 2,
        'photo_id'=> 1,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'photo_id'=> 1,
        'category_id'=> $faker->numberBetween(1,10),
        'title' => $faker->sentence(7,11),
        'content' => $faker->paragraph(rand(10,15),true),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name'=> $faker->randomElement(['category1','category2','category3']),
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id'=>$faker->numberBetween(1,10),
        'photo_id'=> 1,
        'is_active'=> 1,
        'author'=> $faker->name,
        'email'=> $faker->unique()->safeEmail,
        'body' => $faker->paragraph(rand(10,15),true),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\CommentReply::class, function (Faker $faker) {
    return [
        'photo_id'=>1,
        'comment_id'=>$faker->numberBetween(1,10),
        'is_active'=> 1,
        'author'=> $faker->name,
        'email'=> $faker->unique()->safeEmail,
        'body' => $faker->paragraph(rand(10,15),true),
        'remember_token' => str_random(10),
    ];
});

