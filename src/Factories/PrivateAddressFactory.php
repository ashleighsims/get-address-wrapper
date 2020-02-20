<?php

namespace AshleighSims\GetAddressWrapper\Factories;

use AshleighSims\GetAddressWrapper\Response\PrivateAddress;

class PrivateAddressFactory
{
    /**
     * Make a new class for the PrivateAddress
     *
     * @param $data
     * @return PrivateAddress
     */
    public static function make($data)
    {
        return new PrivateAddress($data);
    }
}
