<?php

namespace AshleighSims\GetAddressWrapper\Requests\Base;

abstract class AdminRequest extends BaseRequest
{
    /**
     * AdminRequest constructor.
     *
     * @param $adminApiKey
     * @param $baseUrl
     */
    public function __construct($adminApiKey, $baseUrl)
    {
        parent::__construct('', $adminApiKey, '', $baseUrl);
    }

    /**
     * Set the API Key for the client auth
     *
     * @param array $options
     * @return array
     */
    protected function setApiKeys(array $options) {
        $options['auth'] = ['api-key', $this->adminApiKey];
        return $options;
    }
}
