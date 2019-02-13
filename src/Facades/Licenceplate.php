<?php

namespace Hatamiarash7\OpenALPR\Facades;

use Illuminate\Support\Facades\Facade;

class OpenALPR extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'openalpr';
    }
}
