<?php

use DashboardersHeaven\Game;
use DashboardersHeaven\Gamer;
use DashboardersHeaven\Gamerscore;
use Faker\Factory;
use Illuminate\Database\Seeder;

class GamerTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        /**
         * @var \Illuminate\Database\Eloquent\Collection $games
         */
        $games  = factory(Game::class, 75)
            ->create();
        $gamers = factory(Gamer::class, 20)
            ->create()
            ->each(function (Gamer $gamer) use ($games, $faker) {
                $gamer->gamerscores()->saveMany(
                    factory(Gamerscore::class, 50)->make()
                );

                for ($i = 0; $i < mt_rand(1, 10); $i++) {
                    $gamer->games()->attach($games->random()->id, [
                        'earned_achievements' => $faker->numberBetween(0, 40),
                        'current_gamerscore'  => $faker->numberBetween(0, 1000),
                        'max_gamerscore'      => 1000,
                        'last_unlock'         => $faker->dateTimeThisYear
                    ]);
                }
            });

        $this->command->info("Created " . count($gamers) . " Gamers");
    }
}
