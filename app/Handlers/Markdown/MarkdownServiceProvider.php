<?php namespace App\Handlesr\Markdown;

use Illuminate\Support\ServiceProvider;
use Event;
use App;

class MarkdownServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('App\Handlers\Markdown\Markdown', function ($app) {
            return new \App\Handlers\Markdown\Markdown;
        });
    }

    public function provides()
    {
        return ['App\Handlers\Markdown'];
    }
}
