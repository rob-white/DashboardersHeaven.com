<?php

namespace DashboardersHeaven\Console\Commands;

use DashboardersHeaven\Clip;
use DashboardersHeaven\Gamer;
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
        $this->info('Getting the game clips for ' . $xuid);

        $response = $this->client->get("v2/$xuid/game-clips");
        $clips    = json_decode((string) $response->getBody());

        if (!is_array($clips)) {
            $this->error('Unable to get clips for ' . $xuid);

            return;
        }

        foreach ($clips as $clip) {
            if (isset($clip->state) && $clip->state === "PendingUpload") {
                continue;
            }

            $clipData = $this->extractClipData($clip);
            $clip     = Clip::whereClipId($clipData['clip_id'])->first();

            if (!empty($clip)) {
                $clip->update($clipData);
            } else {
                $clip = Clip::create($clipData);
            }
        }
    }

    private function extractClipData($data)
    {
        return [
            'clip_id'         => data_get($data, 'gameClipId'),
            'title_id'        => data_get($data, 'titleId'),
            'name'            => data_get($data, 'clipName'),
            'xuid'            => data_get($data, 'xuid'),
            'thumbnail_small' => data_get($data, 'thumbnails.0.uri'),
            'thumbnail_large' => data_get($data, 'thumbnails.1.uri'),
            'url'             => $this->getClipUrl(data_get($data, 'gameClipUris')),
            'saved'           => (boolean) data_get($data, 'savedByUser'),
            'recorded_at'     => data_get($data, 'dateRecorded'),
        ];
    }

    private function getClipUrl($uris)
    {
        $downloadUri = array_reduce($uris, function ($inital, $uri) {
            return ($uri->uriType == "Download") ? $uri->uri : null;
        });

        return $downloadUri;
    }
}
