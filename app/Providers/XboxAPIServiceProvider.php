<?php namespace DashboardersHeaven\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class XboxAPIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            return new Client([
                'base_uri'    => 'https://xboxapi.com/v2',
                'http_errors' => false,
                'headers'     => [
                    'X-AUTH'          => $this->app->make('config')->get('xboxapi.api_key'),
                    'Accept-Language' => 'en-US'
                ]
            ]);
        });
    }
}
