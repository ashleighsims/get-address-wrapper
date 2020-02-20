<?php

namespace AshleighSims\GetAddressWrapper\Requests;

use AshleighSims\GetAddressWrapper\Parser;
use AshleighSims\GetAddressWrapper\Requests\Base\AdminRequest;

class PrivateAddress extends AdminRequest
{
    /**
     * PrivateAddress constructor.
     *
     * @param $adminApiKey
     * @param $baseUrl
     */
    public function __construct($adminApiKey, $baseUrl)
    {
        parent::__construct($adminApiKey, $baseUrl);
    }

    /**
     * Add an address to your private address list.
     *
     * @param string $postCode
     * @param array $address
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function add(string $postCode, array $address) : array
    {
        return $this->request(self::METHOD_POST, sprintf('private-address/%s', $postCode), $address);
    }

    /**
     * Delete an address from your private address list.
     *
     * @param string $postCode
     * @param string $id
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function delete(string $postCode, string $id) : array
    {
        return $this->request(self::METHOD_DELETE, sprintf('private-address/%s/%s', $postCode, $id));
    }

    /**
     * Get an address from your private address list.
     *
     * @param string $postCode
     * @param string $id
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function get(string $postCode, string $id)
    {
        return Parser::privateAddressGet($this->request(self::METHOD_GET, sprintf('private-address/%s/%s', $postCode, $id)));
    }

    /**
     * List your addresses in your private address list.
     *
     * @param string $postCode
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function list(string $postCode) : array
    {
        return Parser::privateAddressList($this->request(self::METHOD_GET, sprintf('private-address/%s', $postCode)));
    }
}
