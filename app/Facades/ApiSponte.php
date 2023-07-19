<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

    class ApiSponte extends Facade
    {
            protected static function getFacadeAccessor()
            {
                return 'api-sponte';
            }
    }
