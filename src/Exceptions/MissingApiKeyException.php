<?php

namespace AshleighSims\GetAddressWrapper\Exceptions;

use Exception;

class MissingApiKeyException extends Exception
{
    protected $message = 'One or all of the required API Keys are missing.';
}
