<?php

namespace AshleighSims\GetAddressWrapper\Factories;

use AshleighSims\GetAddressWrapper\Response\DailyUsage;

class DailyUsageFactory
{
    /**
     * Make a new class for the DailyUsage
     *
     * @param $data
     * @return DailyUsage
     */
    public static function make($data)
    {
        return new DailyUsage($data);
    }
}
