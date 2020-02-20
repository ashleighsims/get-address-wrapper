<?php

namespace AshleighSims\GetAddressWrapper\Factories;

use AshleighSims\GetAddressWrapper\Response\GooglePlacesPostcodePrediction;

class GooglePlacesPostcodePredictionFactory
{
    /**
     * Make a new class for the GooglePlacesPostcodePrediction
     *
     * @param $data
     * @return GooglePlacesPostcodePrediction
     */
    public static function make($data)
    {
        return new GooglePlacesPostcodePrediction($data);
    }
}
