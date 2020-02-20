<?php

namespace AshleighSims\GetAddressWrapper;

use AshleighSims\GetAddressWrapper\Factories\AddressFactory;
use AshleighSims\GetAddressWrapper\Factories\DailyUsageFactory;
use AshleighSims\GetAddressWrapper\Factories\DistanceFactory;
use AshleighSims\GetAddressWrapper\Factories\GooglePlaceFactory;
use AshleighSims\GetAddressWrapper\Factories\GooglePlacesPostcodePredictionFactory;
use AshleighSims\GetAddressWrapper\Factories\GooglePlacesPredictionFactory;
use AshleighSims\GetAddressWrapper\Factories\PrivateAddressFactory;
use AshleighSims\GetAddressWrapper\Factories\UsageFactory;
use AshleighSims\GetAddressWrapper\Response\Address;
use AshleighSims\GetAddressWrapper\Response\Distance;
use AshleighSims\GetAddressWrapper\Response\GooglePlace;
use AshleighSims\GetAddressWrapper\Response\PrivateAddress;
use AshleighSims\GetAddressWrapper\Response\Usage;

class Parser
{
    /**
     * Parse the data from FindByPostcode:find() method.
     *
     * @param array $data
     * @return array
     */
    public static function findByPostCode(array $data) : array
    {
        $addresses = [];

        foreach($data['addresses'] as $address) {
            $formattedAddress = AddressFactory::make([
                'longitude' => $data['longitude'],
                'latitude' => $data['latitude'],
                'addresses' => [$address]
            ]);

            array_push($addresses, $formattedAddress);
        }

        return $addresses;
    }

    /**
     * Parse the data from FindByPostcode:findWithNumber() method.
     *
     * @param array $data
     * @return Address
     */
    public static function findByPostCodeAndNumber(array $data) : Address
    {
        return AddressFactory::make($data);
    }

    /**
     * Parse the data from Distance:between() method.
     *
     * @param array $data
     * @return Distance
     */
    public static function distanceBetween(array $data) : Distance
    {
        return DistanceFactory::make($data);
    }

    /**
     * Parse the data from Usage:get(), Usage:getByDate() method.
     *
     * @param array $data
     * @return Usage
     */
    public static function usageGet(array $data) : Usage
    {
        return UsageFactory::make($data);
    }

    /**
     * Parse the data from Usage:getBetween() method.
     *
     * @param array $data
     * @return array
     */
    public static function usageGetBetween(array $data) : array
    {
        $usageDays = [];

        foreach($data as $day) {
            $dayUsage = DailyUsageFactory::make([
                'date' => $day['date'],
                'count' => $day['count']
            ]);

            array_push($usageDays, $dayUsage);
        }

        return $usageDays;
    }

    /**
     * Parse the data from PrivateAddress:get() method.
     *
     * @param array $data
     * @return PrivateAddress
     */
    public static function privateAddressGet(array $data) : PrivateAddress
    {
        return PrivateAddressFactory::make($data);
    }

    /**
     * Parse the data from PrivateAddress:list() method.
     *
     * @param array $data
     * @return array
     */
    public static function privateAddressList(array $data) : array
    {
        $privateAddresses = [];

        foreach($data as $privateAddress) {
            $address = PrivateAddressFactory::make($privateAddress);

            array_push($privateAddresses, $address);
        }

        return $privateAddresses;
    }

    /**
     * Parse the data from AutoCompletePlaces:complete() method.
     *
     * @param array $data
     * @return array
     */
    public static function autoCompletePlaces(array $data) : array
    {
        $predictions = [];

        foreach($data['predictions'] as $prediction) {
            $placesItem = GooglePlacesPredictionFactory::make($prediction);

            array_push($predictions, $placesItem);
        }

        return $predictions;
    }

    /**
     * Parse the data from AutoCompletePlaces:findByGooglePlacesId() method.
     *
     * @param array $data
     * @return GooglePlace
     */
    public static function autoCompletePlacesFindByPlacesId(array $data) : GooglePlace
    {
        return GooglePlaceFactory::make($data);
    }

    /**
     * Parse the data from AutoCompletePostcode:complete() method.
     *
     * @param array $data
     * @return array
     */
    public static function autoCompletePostcode(array $data) : array
    {
        $predictions = [];

        foreach($data['predictions'] as $prediction) {
            $placesItem = GooglePlacesPostcodePredictionFactory::make($prediction);

            array_push($predictions, $placesItem);
        }

        return $predictions;
    }
}
