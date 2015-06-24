<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $tables = [
            'gamerscores',
            'game_gamer',
            'gamers',
            'games',
        ];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        Model::unguard();

        $this->call('GamerTableSeeder');

        Model::reguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
