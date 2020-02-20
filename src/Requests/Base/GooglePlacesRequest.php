<?php

namespace AshleighSims\GetAddressWrapper\Requests\Base;

abstract class GooglePlacesRequest extends BaseRequest
{
    /**
     * GooglePlacesRequest constructor.
     *
     * @param $apiKey
     * @param $googlePlacesApiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $googlePlacesApiKey, $baseUrl)
    {
        parent::__construct($apiKey, '', $googlePlacesApiKey, $baseUrl);
    }
}
