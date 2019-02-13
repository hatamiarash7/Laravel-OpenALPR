<?php

namespace Hatamiarash7\OpenALPR;

use Illuminate\Support\ServiceProvider;

class OpenALPRServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('openalpr', 'Hatamiarash7\OpenALPR\OpenALPR');
        $this->mergeConfigFrom(__DIR__ . '/../config/openalpr.php', 'openalpr');
        $this->publishes([__DIR__ . '/../config/openalpr.php' => config_path('openalpr.php')], 'config');
    }
}
