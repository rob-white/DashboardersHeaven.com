<?php

namespace DashboardersHeaven\Console\Commands;

use Illuminate\Console\Command;

class GamersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gamers {xuid : The XUID of the Gamer}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The master command that trigers the various update commands';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $xuid = $this->argument('xuid');
        $this->info('Starting the update for XUID: ' . $xuid);

        $this->call('gamers:update', ['xuid' => $xuid]);

        $this->call('gamers:games', ['xuid' => $xuid]);
    }
}
