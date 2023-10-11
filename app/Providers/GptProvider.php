<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class GptProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('api-gpt', function () {
            return Http::withOptions([
                'base_uri' => 'https://api.openai.com/v1/'
            ])->withHeaders([
                'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
                'Accept'=> 'application/json',
                'Content-Type' => 'application/json',
            ]);
        });
    }
}
