<?php

namespace AshleighSims\GetAddressWrapper\Factories;

use AshleighSims\GetAddressWrapper\Response\Distance;

class DistanceFactory
{
    /**
     * Make a new class for the Distance
     *
     * @param $data
     * @return Distance
     */
    public static function make($data)
    {
        return new Distance($data);
    }
}
