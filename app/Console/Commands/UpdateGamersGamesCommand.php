<?php

namespace DashboardersHeaven\Console\Commands;

use DashboardersHeaven\Game;
use DashboardersHeaven\Gamer;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class UpdateGamersGamesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gamers:games {xuid : The XUID of the Gamer.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the games the gamer has played.';

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var \DashboardersHeaven\Gamer
     */
    private $gamer;

    /**
     * Create a new command instance.
     *
     * @param \GuzzleHttp\Client $client
     */
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
        $this->getXboxOneGames($xuid);
    }

    private function getXboxOneGames($xuid)
    {
        //TODO: Look into using the game information api to get more info
        $this->info('Getting the gamercard data for ' . $xuid);

        $response = $this->client->get("v2/$xuid/xboxonegames");
        $titles   = json_decode((string) $response->getBody())['titles'];

        foreach ($titles as $title) {
            $titleData = $this->transformTitleData($title);
            $game      = Game::firstOrCreate($titleData);

            //Find and update, or create relationship between the gamer and the game
            if ($game->exists) {
                $game->update($titleData);
            }
        }
    }

    private function transformTitleData($title)
    {
        return [
            'title'    => data_get($title, 'name'),
            'title_id' => data_get($title, 'titleId'),
        ];
    }
}
