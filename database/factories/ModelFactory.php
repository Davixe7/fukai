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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Store_product::class, function (Faker\Generator $faker) {
    $sName = 'sushi '.$faker->firstName;
    $sSlug = str_slug($sName, "-");
    return [
        'name' => $sName,
        'slug' => $sSlug,
        'description' => $faker->text(200),
        'extract' => $faker->text(50),
        'price' => $faker->randomElement([10000,12000,14990,5000]),
        'price_before' => $faker->randomElement([10000,12000,14990,5000]),
        'discount' => $faker->randomElement([10,20,15,25]),
        'image' => $faker->imageUrl(800, 400, 'food'),
        'status' => 1,
    ];
});
