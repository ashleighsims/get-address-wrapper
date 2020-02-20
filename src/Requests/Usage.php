<?php

namespace AshleighSims\GetAddressWrapper\Requests;

use AshleighSims\GetAddressWrapper\Parser;
use AshleighSims\GetAddressWrapper\Requests\Base\AdminRequest;
use Carbon\Carbon;

class Usage extends AdminRequest
{
    /**
     * Usage constructor.
     *
     * @param $adminApiKey
     * @param $baseUrl
     */
    public function __construct($adminApiKey, $baseUrl)
    {
        parent::__construct($adminApiKey, $baseUrl);
    }

    /**
     * Get the usage data for today.
     *
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function get()
    {
        return Parser::usageGet($this->request(self::METHOD_GET, 'v3/usage/'));
    }

    /**
     * Get the usage data for a given date.
     *
     * @param string $date
     * @param string $format
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function getByDate(string $date, string $format)
    {
        $usageDate = Carbon::createFromFormat($format, $date);

        return Parser::usageGet($this->request(self::METHOD_GET,
            sprintf('v3/usage/%s/%s/%s', $usageDate->day, $usageDate->month, $usageDate->year)));
    }

    /**
     * Get the usage data from between 2 dates.
     *
     * @param string $fromDate
     * @param string $toDate
     * @param string $format
     * @return mixed
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\ApiKeyInvalidException
     * @throws \AshleighSims\GetAddressWrapper\Exceptions\GetAddressIOException
     */
    public function getBetween(string $fromDate, string $toDate, string $format)
    {
        $usageFromDate = Carbon::createFromFormat($format, $fromDate);
        $usageToDate = Carbon::createFromFormat($format, $toDate);

        return Parser::usageGetBetween($this->request(self::METHOD_GET,
            sprintf('usage/from/%s/%s/%s/To/%s/%s/%s',
                $usageFromDate->day, $usageFromDate->month, $usageFromDate->year,
                $usageToDate->day, $usageToDate->month, $usageToDate->year)));
    }
}
