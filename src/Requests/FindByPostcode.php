<?php

namespace AshleighSims\GetAddressWrapper\Requests;

use AshleighSims\GetAddressWrapper\Requests\Base\Request;

class FindByPostcode extends Request
{
    /**
     * FindByPostcode constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Find addresses of a given post code.
     *
     * @param string $postCode
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function find(string $postCode)
    {
        return $this->request(self::METHOD_GET, sprintf('/find/%s', $postCode));
    }

    /**
     * Find address details of a given postcode and building number.
     *
     * @param string $postCode
     * @param string $number
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function findWithNumber(string $postCode, string $number)
    {
        return $this->request(self::METHOD_GET, sprintf('/find/%s/%s', $postCode, $number));
    }
}
