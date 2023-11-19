<?php

namespace Renannazar\LaravelOpenaiContext;

use Illuminate\Support\ServiceProvider;

class OpenaiContextServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('renannazar.laravelopenaicontext.openaicontext', \Renannazar\LaravelOpenaiContext\Services\OpenaiContext::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
