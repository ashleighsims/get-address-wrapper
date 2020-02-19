<?php

namespace AshleighSims\GetAddressWrapper\Exceptions;

use Exception;

class ApiKeyInvalidException extends Exception
{
    protected $message = 'API Key is not valid.';
}
