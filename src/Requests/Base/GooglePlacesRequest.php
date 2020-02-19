<?php

namespace AshleighSims\GetAddressWrapper\Requests\Base;

abstract class GooglePlacesRequest extends BaseRequest
{
    /**
     * GooglePlacesRequest constructor.
     *
     * @param $adminApiKey
     * @param $googlePlacesApiKey
     * @param $baseUrl
     */
    public function __construct($adminApiKey, $googlePlacesApiKey, $baseUrl)
    {
        parent::__construct('', $adminApiKey, $googlePlacesApiKey, $baseUrl);
    }

    /**
     * Set the API keys for the client auth
     *
     * @param array $options
     * @return array
     */
    protected function setApiKeys(array $options) {
        $options['auth'] = ['api-key', $this->adminApiKey, 'google-api-key', $this->googlePlacesApiKey];
        return $options;
    }
}
