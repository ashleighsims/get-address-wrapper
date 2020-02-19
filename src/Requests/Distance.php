<?php

namespace AshleighSims\GetAddressWrapper\Requests;

use AshleighSims\GetAddressWrapper\Requests\Base\Request;

class Distance extends Request
{
    /**
     * Distance constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get the distance in metres between 2 postcodes
     *
     * @param string $postCodeTo
     * @param string $postCodeFrom
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function between(string $postCodeTo, string $postCodeFrom)
    {
        return $this->request(self::METHOD_GET, sprintf('distance/%s/%s', $postCodeFrom, $postCodeTo));
    }
}
