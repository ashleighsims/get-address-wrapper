<?php

namespace AshleighSims\GetAddressWrapper\Factories;

use AshleighSims\GetAddressWrapper\Response\Usage;

class UsageFactory
{
    /**
     * Make a new class for the Usage
     *
     * @param $data
     * @return Usage
     */
    public static function make($data)
    {
        return new Usage($data);
    }
}
