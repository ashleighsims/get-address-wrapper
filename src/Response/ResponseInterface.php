<?php

namespace AshleighSims\GetAddressWrapper\Response;


interface ResponseInterface
{
    public function toArray();
    public function toJson();
    public function toCsv();
}
