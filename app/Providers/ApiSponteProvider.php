<?php

namespace App\Providers;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ApiSponteProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('api-sponte', function () {
            return Http::withOptions([
                'base_uri' => 'https://webservices.sponteweb.com.br/WSApiSponteRest/api/'
            ])->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'api_key' => '8D7034',
                'stream' => true,
                'version' => '1.0',
            ]);
        });
    }

}
