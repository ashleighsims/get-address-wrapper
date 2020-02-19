<?php

namespace AshleighSims\GetAddressWrapper\Requests\Base;

abstract class Request extends BaseRequest
{
    /**
     * Request constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, '', '', $baseUrl);
    }
}
