<?php

namespace AshleighSims\GetAddressWrapper\Requests;

use App\Services\GetAddressIOLaravel\Src\Dto\GooglePlacesDto;
use App\Services\GetAddressIOLaravel\Src\Dto\PredictionDto;
use AshleighSims\GetAddressWrapper\Parser;
use AshleighSims\GetAddressWrapper\Requests\Base\GooglePlacesRequest;

class AutoCompletePlaces extends GooglePlacesRequest
{
    /**
     * AutoCompletePlaces constructor.
     *
     * @param string $apiKey
     * @param string $googlePlacesApiKey
     * @param string $baseUrl
     */
    public function __construct(string $apiKey, string $googlePlacesApiKey, string $baseUrl)
    {
        parent::__construct($apiKey, $googlePlacesApiKey, $baseUrl);
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
        return Parser::autoCompletePlaces($this->request(self::METHOD_GET,
            sprintf('auto-complete/places/%s?api-key=%s&google-api-key=%s', $placeName, $this->apiKey, $this->googlePlacesApiKey)));
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
        return Parser::autoCompletePlacesFindByPlacesId($this->request(self::METHOD_GET,
            sprintf('google/place-details/%s?api-key=%s&google-api-key=%s', $placeId, $this->apiKey, $this->googlePlacesApiKey)));
    }
}
