<?php

namespace AshleighSims\GetAddressWrapper\Response;

class DailyUsage implements ResponseInterface
{
    /**
     * @var string
     */
    private $date;

    /**
     * @var integer
     */
    private $count;

    /**
     * DailyUsage constructor.
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
    private function parseData($data) : void
    {
        $this->date = $data['date'];
        $this->count = $data['count'];
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'date' => $this->getDate(),
            'count' => $this->getCount(),
        ];
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode([
            'date' => $this->getDate(),
            'count' => $this->getCount()
        ]);
    }

    /**
     * @return string
     */
    public function toCsv()
    {
        return sprintf('%s,%d', $this->getDate(), $this->getCount());
    }
}
