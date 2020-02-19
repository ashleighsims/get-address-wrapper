<?php

namespace AshleighSims\GetAddressWrapper\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use AshleighSims\GetAddressWrapper\GetAddressWrapper as GetAddress;

class GetAddressWrapper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GetAddress::class;
    }
}
