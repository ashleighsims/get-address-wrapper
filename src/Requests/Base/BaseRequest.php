<?php

namespace AshleighSims\GetAddressWrapper\Requests\Base;

use AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException;
use AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException;
use GuzzleHttp\Client;

abstract class BaseRequest
{
    const METHOD_GET = "GET";
    const METHOD_POST = "POST";
    const METHOD_DELETE = "DELETE";

    /**
     * @var Client
     */
    private $client;

    /**
     * @var \Illuminate\Config\Repository
     */
    private $url;

    /**
     * @var \Illuminate\Config\Repository
     */
    protected $apiKey;

    /**
     * @var \Illuminate\Config\Repository
     */
    protected $googlePlacesApiKey;

    /**
     * @var \Illuminate\Config\Repository
     */
    protected $adminApiKey;

    /**
     * GetAddressBaseRequest constructor.
     */
    public function __construct(string $apiKey, string $adminApiKey, string $googlePlacesApiKey, string $baseUrl)
    {
        $this->url = $baseUrl;
        $this->apiKey = $apiKey;
        $this->adminApiKey = $adminApiKey;
        $this->googlePlacesApiKey = $googlePlacesApiKey;

        $this->setClient();
    }

    /**
     * Make HTTP requests to the API.
     *
     * @param string $method
     * @param string $uri
     * @param array $data
     * @param array $options
     * @return mixed
     * @throws ApiKeyInvalidException
     * @throws GetAddressIOException
     */
    protected function request(string $method, string $uri, array $data = [], array $options = []) {

        $options = $this->setData($options, $data);
        $options = $this->setApiKeys($options);

        try {
            $response = $this->getClient()->request($method, $uri, $options);
        } catch (\Exception $e){
            if($e->getCode() == 401) {
                throw new ApiKeyInvalidException;
            }

            throw new GetAddressIOException;
        }

        return $response->getBody()->getContents();
    }

    /**
     * Set the HTTP client
     *
     * @return void
     */
    private function setClient()
    {
        $this->client = new Client([
            'base_uri' => $this->url
        ]);
    }

    /**
     * Return the HTTP client for use
     *
     * @return Client
     */
    private function getClient()
    {
        return $this->client;
    }

    /**
     * Set the API key for the client auth.
     *
     * @param array $options
     * @return array
     */
    protected function setApiKeys(array $options) {
        $options['auth'] = ['api-key', $this->apiKey];
        return $options;
    }

    /**
     * Set the data to be posted.
     *
     * @param array $options
     * @param array $data
     * @return array
     */
    protected function setData(array $options, array $data) {
        if(!empty($data)) {
            $options['json'] = $data;
        }

        return $options;
    }
}
