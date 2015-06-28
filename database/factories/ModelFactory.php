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

$factory->define(DashboardersHeaven\Gamer::class, function ($faker) {
    /**
     * @var \Faker\Generator $faker
     */

    return [
        'xuid'            => $faker->randomNumber(7),
        'gamertag'        => $faker->userName,
        'gamerscore'      => $faker->randomNumber(7),
        'gamerpic_small'  => $faker->imageUrl(),
        'gamerpic_large'  => $faker->imageUrl(),
        'display_pic'     => $faker->imageUrl(),
        'motto'           => ( mt_rand(0, 1) ) ? $faker->sentence() : null,
        'bio'             => ( mt_rand(0, 1) ) ? $faker->text() : null,
        'avatar_manifest' => null,
    ];
});

$factory->define(DashboardersHeaven\Gamerscore::class, function ($faker) {
    /**
     * @var \Faker\Generator $faker
     */

    return [
        'score'      => $faker->numberBetween(5, 100),
        'created_at' => $faker->dateTimeThisYear
    ];
});

$factory->define(DashboardersHeaven\Game::class, function ($faker) {
    /**
     * @var \Faker\Generator $faker
     */

    return [
        'title_id' => $faker->randomNumber(6),
        'title'    => $faker->sentence
    ];
});
