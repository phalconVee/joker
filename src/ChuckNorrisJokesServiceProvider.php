<?php

namespace PhalconVee\Joker;

use Illuminate\Support\ServiceProvider;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokeFactory();
        });
    }
}
