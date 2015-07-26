<?php

namespace DashboardersHeaven\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class UpdateGamersClipsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gamers:clips {xuid : The XUID of the Gamer.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the gamers clips.';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;
    protected $gamer;

    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $xuid        = $this->argument('xuid');
        $this->gamer = Gamer::whereXuid($xuid)->first();

        $this->getClips($xuid);
    }

    private function getClips($xuid)
    {
        $this->info('Getting the gamercard data for ' . $xuid);

        $response = $this->client->get("v2/$xuid/game-clips");
        $clips    = json_decode((string) $response->getBody());

        foreach ($clips as $clip) {
            //TODO: Get game clip information and save them.
        }
    }
}
