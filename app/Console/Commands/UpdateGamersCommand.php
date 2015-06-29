<?php namespace DashboardersHeaven\Console\Commands;

use DashboardersHeaven\Gamer;
use DashboardersHeaven\Gamerscore;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Illuminate\Console\Command;
use Illuminate\Contracts\Config\Repository;

class UpdateGamersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:gamers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the gamers table with new Xbox Live information.';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $gamertags;

    /**
     * @var array
     */
    protected $gamertagXUIDS = [];

    protected $cleanRun = false;

    public function __construct(Client $client, Repository $config)
    {
        parent::__construct();
        $this->client    = $client;
        $this->gamertags = $config->get('xboxapi.gamertags');
        $this->prepareXuids();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Getting profile information...');
        $profiles = [];
        if ($this->cleanRun) {
            $profiles = $this->getProfilesFirstTime();
        } else {
            $profiles = $this->getProfiles();
        }

        if (empty($profiles)) {
            $this->error('No available profiles');

            return false;
        }

        $this->createOrUpdateGamers($profiles);
        $this->updateWithGamercard();
    }

    protected function prepareXuids()
    {
        $gamers = Gamer::all();

        if ($gamers->isEmpty()) {
            $this->cleanRun      = true;
            $this->gamertagXUIDS = array_flip($this->gamertags);
            array_walk($this->gamertagXUIDS, function (&$value) {
                $value = null;
            });

            return;
        }

        $this->gamertagXUIDS = $gamers->reduce(function ($xuids, Gamer $gamer) {
            $xuids[$gamer->gamertag] = $gamer->xuid;

            return $xuids;
        }, []);

        return;
    }

    protected function getProfilesFirstTime()
    {
        $this->info('Profile first run, getting XUIDs...');
        $promises = [];
        foreach ($this->gamertagXUIDS as $gamertag => $xuid) {
            $promises[$gamertag] = $this->client->getAsync("v2/xuid/$gamertag");
        }

        $this->output->progressStart(count($promises));

        $results = $this->unwrap($promises);

        $this->output->progressFinish(count($promises));

        array_walk($results, function (&$result, $gamertag) {
            $result = $this->gamertagXUIDS[$gamertag] = (int) (string) $result->getBody();
        });

        return $this->getProfiles($results);
    }

    protected function getProfiles(array $xuids = [])
    {
        $this->info('Getting profile data...');
        $xuids = (!empty($xuids)) ? $xuids : $this->gamertagXUIDS;

        $promises = [];

        foreach ($xuids as $gamertag => $xuid) {
            $promises[$gamertag] = $this->client->getAsync("v2/$xuid/profile");
        }

        $this->output->progressStart(count($promises));

        $results = $this->unwrap($promises);

        $this->output->progressFinish(count($promises));

        array_walk($results, function (&$result) {
            $result = json_decode((string) $result->getBody());
        });

        return $results;
    }

    protected function createOrUpdateGamers($profiles)
    {
        if ($this->cleanRun) {
            $this->createGamers($profiles);

            return;
        }

        foreach ($profiles as $gamertag => $profile) {
            /**
             * @var Gamer $gamer
             */
            $gamer = Gamer::whereGamertag($gamertag)->first();

            $data = $this->extractProfileData($profile);
            $gamer->update($data);

            $gamer->gamerscores()->save(new Gamerscore(['score' => $data['gamerscore']]));
        }
    }

    protected function createGamers($profiles)
    {
        foreach ($profiles as $gamertag => $profile) {
            $data  = $this->extractProfileData($profile);
            $gamer = Gamer::create($data);

            $gamer->gamerscores()->save(new Gamerscore(['score' => $data['gamerscore']]));
        }
    }

    protected function updateWithGamercard()
    {
        $this->info('Getting gamercard information...');
        $promises = [];
        foreach ($this->gamertagXUIDS as $gamertag => $xuid) {
            $promises[$gamertag] = $this->client->getAsync("v2/$xuid/gamercard");
        }

        $this->output->progressStart(count($promises));

        $results = $this->unwrap($promises);

        $this->output->progressFinish(count($promises));

        array_walk($results, function (&$result) {
            $result = json_decode((string) $result->getBody());
        });

        foreach ($results as $gamertag => $gamercard) {
            /**
             * @var Gamer $gamer
             */
            $gamer = Gamer::whereGamertag($gamertag)->first();

            $data = $this->extractGamercardData($gamercard);
            $gamer->update($data);
        }
    }

    protected function extractProfileData($profile)
    {
        return [
            'xuid'            => data_get($profile, 'id'),
            'gamertag'        => data_get($profile, 'Gamertag'),
            'gamerscore'      => data_get($profile, 'Gamerscore'),
            'gamerpic_small'  => data_get($profile, 'gamerpicSmallSslImagePath'),
            'gamerpic_large'  => data_get($profile, 'gamerpicLargeSslImagePath'),
            'display_pic'     => data_get($profile, 'GameDisplayPicRaw'),
            'motto'           => data_get($profile, 'motto'),
            'bio'             => data_get($profile, 'bio'),
            'avatar_manifest' => data_get($profile, 'avatarManifest'),
            'level'           => data_get($profile, 'TenureLevel'),
        ];
    }

    protected function extractGamercardData($gamercard)
    {
        return [
            'gamerpic_small'  => data_get($gamercard, 'gamerpicSmallSslImagePath'),
            'gamerpic_large'  => data_get($gamercard, 'gamerpicLargeSslImagePath'),
            'motto'           => data_get($gamercard, 'motto'),
            'bio'             => data_get($gamercard, 'bio'),
            'avatar_manifest' => data_get($gamercard, 'avatarManifest'),
        ];
    }

    private function unwrap(array $promises)
    {
        $results = [];
        foreach ($promises as $key => $promise) {
            $this->output->progressAdvance();
            $results[$key] = $promise->wait();
        }

        return $results;
    }
}
