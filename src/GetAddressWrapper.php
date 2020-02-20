<?php

namespace AshleighSims\GetAddressWrapper;

use AshleighSims\GetAddressWrapper\Requests\AutoCompletePlaces;
use AshleighSims\GetAddressWrapper\Requests\AutoCompletePostcode;
use AshleighSims\GetAddressWrapper\Requests\Distance;
use AshleighSims\GetAddressWrapper\Requests\FindByPostcode;
use AshleighSims\GetAddressWrapper\Requests\PrivateAddress;
use AshleighSims\GetAddressWrapper\Requests\Usage;
use AshleighSims\GetAddressWrapper\Exceptions\MissingApiKeyException;

class GetAddressWrapper
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $adminApiKey;

    /**
     * @var string
     */
    private $googlePlacesApiKey;

    /**
     * @var string
     */
    private $baseUrl;

    public function __construct(string $apiKey = '', string $adminApiKey = '', string $googlePlacesApiKey = '', string $baseUrl = 'https://api.getAddress.io')
    {
        $this->apiKey = $apiKey;
        $this->adminApiKey = $adminApiKey;
        $this->googlePlacesApiKey = $googlePlacesApiKey;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Find addresses with postcode or postcode and building number.
     *
     * @return FindByPostcode
     * @throws MissingApiKeyException
     */
    public function findByPostcode()
    {
        if($this->apiKey == '') {
            throw new MissingApiKeyException;
        }

        return new FindByPostcode($this->apiKey, $this->baseUrl);
    }

    /**
     * Get the distance in metres between 2 postcodes.
     *
     * @return Distance
     * @throws MissingApiKeyException
     */
    public function distance()
    {
        if($this->apiKey == '') {
            throw new MissingApiKeyException;
        }

        return new Distance($this->apiKey, $this->baseUrl);
    }

    /**
     * Private Address, add, remove and retrieve.
     *
     * @return PrivateAddress
     * @throws MissingApiKeyException
     */
    public function privateAddress()
    {
        if($this->adminApiKey == '') {
            throw new MissingApiKeyException;
        }

        return new PrivateAddress($this->adminApiKey, $this->baseUrl);
    }

    /**
     * Get the usage data from your account.
     *
     * @return Usage
     * @throws MissingApiKeyException
     */
    public function usage()
    {
        if($this->adminApiKey == '') {
            throw new MissingApiKeyException;
        }

        return new Usage($this->adminApiKey, $this->baseUrl);
    }

    /**
     * Auto complete a postcode using Google Places API.
     *
     * @return AutoCompletePostcode
     * @throws MissingApiKeyException
     */
    public function autoCompletePostcode()
    {
        if($this->apiKey == '' || $this->googlePlacesApiKey == '') {
            throw new MissingApiKeyException;
        }

        return new AutoCompletePostcode($this->apiKey, $this->googlePlacesApiKey, $this->baseUrl);
    }

    /**
     * Auto complete place name using Google Places API.
     *
     * @return AutoCompletePlaces
     * @throws MissingApiKeyException
     */
    public function autoCompletePlaces()
    {
        if($this->apiKey == '' || $this->googlePlacesApiKey == '') {
            throw new MissingApiKeyException;
        }

        return new AutoCompletePlaces($this->apiKey, $this->googlePlacesApiKey, $this->baseUrl);
    }
}
