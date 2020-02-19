<?php

namespace AshleighSims\GetAddressWrapper\Exceptions;

use Exception;

class GetAddressIOException extends Exception
{
    protected $message = 'An error occurred retrieving the requested resource.';
}
