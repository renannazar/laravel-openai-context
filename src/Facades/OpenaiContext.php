<?php

namespace Renannazar\LaravelOpenaiContext\Facades;

use Illuminate\Support\Facades\Facade;

class OpenaiContext extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'renannazar.laravelopenaicontext.openaicontext';
    }

    static function test() {
        return 'test';
    }
}