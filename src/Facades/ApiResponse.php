<?php

namespace Satheez\ApiResponse\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Satheez\ApiResponse\ApiResponse
 */
class ApiResponse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api-response';
    }
}
