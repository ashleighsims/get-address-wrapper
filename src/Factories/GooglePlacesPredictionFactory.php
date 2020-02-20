<?php

namespace AshleighSims\GetAddressWrapper\Factories;

use AshleighSims\GetAddressWrapper\Response\GooglePlacesPrediction;

class GooglePlacesPredictionFactory
{
    /**
     * Make a new class for the GooglePlacesPredictions
     *
     * @param $data
     * @return GooglePlacesPrediction
     */
    public static function make($data)
    {
        return new GooglePlacesPrediction($data);
    }
}
