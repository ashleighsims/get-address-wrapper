<?php

namespace AshleighSims\GetAddressWrapper\Response;

class Usage implements ResponseInterface
{
    /**
     * @var integer
     */
    private $usageToday;

    /**
     * @var integer
     */
    private $dailyLimit;

    /**
     * @var integer
     */
    private $monthlyBuffer;

    /**
     * @var integer
     */
    private $monthlyBufferUsed;

    /**
     * Usage constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->parseData($data);
    }

    /**
     * Parse the data passed through the constructor.
     *
     * @param $data
     * @return void
     */
    private function parseData($data)
    {
        $this->usageToday = $data['usage_today'];
        $this->dailyLimit = $data['daily_limit'];
        $this->monthlyBuffer = $data['monthly_buffer'];
        $this->monthlyBufferUsed = $data['monthly_buffer_used'];
    }

    /**
     * @return int
     */
    public function getUsageToday()
    {
        return $this->usageToday;
    }

    /**
     * @return int
     */
    public function getDailyLimit()
    {
        return $this->dailyLimit;
    }

    /**
     * @return int
     */
    public function getMonthlyBuffer()
    {
        return $this->monthlyBuffer;
    }

    /**
     * @return int
     */
    public function getMonthlyBufferUsed()
    {
        return $this->monthlyBufferUsed;
    }

    /**
     * @return int
     */
    public function getRemainingUsage()
    {
        return $this->getDailyLimit() - $this->getUsageToday();
    }

    /**
     * @return int
     */
    public function getRemainingBuffer()
    {
        return $this->getMonthlyBuffer() - $this->getMonthlyBufferUsed();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'usage' => $this->getUsageToday(),
            'daily-limit' => $this->getDailyLimit(),
            'monthly-buffer' => $this->getMonthlyBuffer(),
            'monthly-buffer-used' => $this->getMonthlyBufferUsed()
        ];
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode([
            'usage' => $this->getUsageToday(),
            'daily-limit' => $this->getDailyLimit(),
            'monthly-buffer' => $this->getMonthlyBuffer(),
            'monthly-buffer-used' => $this->getMonthlyBufferUsed()
        ]);
    }

    /**
     * @return string
     */
    public function toCsv()
    {
        return sprintf('%d,%d,%d,%d', $this->getUsageToday(), $this->getDailyLimit(), $this->getMonthlyBuffer(), $this->getMonthlyBufferUsed());
    }
}
