<?php

namespace AshleighSims\GetAddressWrapper\Factories;

use AshleighSims\GetAddressWrapper\Response\GooglePlace;

class GooglePlaceFactory
{
    /**
     * Make a new class for the GooglePlace
     *
     * @param $data
     * @return GooglePlace
     */
    public static function make($data)
    {
        return new GooglePlace($data);
    }
}
