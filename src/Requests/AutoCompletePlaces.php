<?php

namespace AshleighSims\GetAddressWrapper\Requests;

use App\Services\GetAddressIOLaravel\Src\Dto\GooglePlacesDto;
use App\Services\GetAddressIOLaravel\Src\Dto\PredictionDto;
use AshleighSims\GetAddressWrapper\Requests\Base\GooglePlacesRequest;

class AutoCompletePlaces extends GooglePlacesRequest
{
    /**
     * AutoCompletePlaces constructor.
     *
     * @param string $adminApiKey
     * @param string $googlePlacesApiKey
     * @param string $baseUrl
     */
    public function __construct(string $adminApiKey, string $googlePlacesApiKey, string $baseUrl)
    {
        parent::__construct($adminApiKey, $googlePlacesApiKey, $baseUrl);
    }

    /**
     * Complete the the name of the provided place name.
     *
     * @param string $placeName
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function complete(string $placeName)
    {
        return $this->request(self::METHOD_GET, sprintf('auto-complete/places/%s', $placeName));
    }

    /**
     * Get the place details of a given Google Places ID.
     *
     * @param string $placeId
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function findByGooglePlacesId(string $placeId)
    {
        return $this->request(self::METHOD_GET, sprintf('google/place-details/%s', $placeId));
    }
}
