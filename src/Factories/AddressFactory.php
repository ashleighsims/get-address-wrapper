<?php

namespace AshleighSims\GetAddressWrapper\Factories;

use AshleighSims\GetAddressWrapper\Response\Address;

class AddressFactory
{
    /**
     * Make a new class for the Address
     *
     * @param $data
     * @return Address
     */
    public static function make($data)
    {
        return new Address($data);
    }
}
