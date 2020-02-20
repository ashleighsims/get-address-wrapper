<?php

namespace AshleighSims\GetAddressWrapper\Requests;

use AshleighSims\GetAddressWrapper\Parser;
use AshleighSims\GetAddressWrapper\Requests\Base\GooglePlacesRequest;

class AutoCompletePostcode extends GooglePlacesRequest
{
    /**
     * AutoCompletePostcode constructor.
     *
     * @param $adminApiKey
     * @param $googlePlacesApiKey
     * @param $baseUrl
     */
    public function __construct($adminApiKey, $googlePlacesApiKey, $baseUrl)
    {
        parent::__construct($adminApiKey, $googlePlacesApiKey, $baseUrl);
    }

    /**
     * Retrieve postcode auto complete options based off partial post code.
     *
     * @param string $postCode
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function complete(string $postCode)
    {
        return Parser::autoCompletePostcode($this->request(self::METHOD_GET,
            sprintf('auto-complete/postcodes/%s?api-key=%s&google-api-key=%s', $postCode, $this->apiKey, $this->googlePlacesApiKey)));
    }
}
