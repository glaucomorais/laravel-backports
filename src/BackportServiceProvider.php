<?php

namespace GlaucoMorais\LaravelBackports;

use Backports\Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\ServiceProvider;

class BackportServiceProvider extends ServiceProvider
{
    public $singletons = [
        Vite::class => Vite::class
    ];

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->registerBladeCompiler();
    }

    public function registerBladeCompiler()
    {
        $this->app->singleton('blade.compiler', function ($app) {
            return tap(new BladeCompiler(
                $app['files'],
                $app['config']['view.compiled'],
                $app['config']->get('view.relative_hash', false) ? $app->basePath() : '',
                $app['config']->get('view.cache', true),
                $app['config']->get('view.compiled_extension', 'php'),
            ), function ($blade) {
                $blade->component('dynamic-component', DynamicComponent::class);
            });
        });
    }
}
