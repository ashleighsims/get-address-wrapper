<?php

namespace AshleighSims\GetAddressWrapper\Requests;

use AshleighSims\GetAddressWrapper\Parser;
use AshleighSims\GetAddressWrapper\Requests\Base\Request;
use AshleighSims\GetAddressWrapper\Response\Address;

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
     * @return array
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function find(string $postCode) : array
    {
        return Parser::findByPostCode($this->request(self::METHOD_GET, sprintf('/find/%s', $postCode)));
    }

    /**
     * Find address details of a given postcode and building number.
     *
     * @param string $postCode
     * @param string $number
     * @return Address
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function findWithNumber(string $postCode, string $number) : Address
    {
        return Parser::findByPostCodeAndNumber($this->request(self::METHOD_GET, sprintf('/find/%s/%s', $postCode, $number)));
    }
}
