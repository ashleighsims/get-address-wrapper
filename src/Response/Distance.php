<?php

namespace AshleighSims\GetAddressWrapper\Response;

class Distance implements ResponseInterface
{
    /**
     * @var float
     */
    private const METRE_TO_MILE = 0.0006213712;

    /**
     * @var float
     */
    private const METRE_TO_KILOMETRE = 0.001;

    /**
     * @var float
     */
    private const METRE_TO_YARDS = 1.09361;

    /**
     * @var array
     */
    private $to;

    /**
     * @var array
     */
    private $from;

    /**
     * @var float
     */
    private $metres;

    /**
     * Distance constructor.
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
        $this->to = [
            'longitude' => $data['to']['longitude'],
            'latitude' => $data['to']['latitude'],
            'postcode' => $data['to']['postcode']
        ];

        $this->from = [
            'longitude' => $data['from']['longitude'],
            'latitude' => $data['from']['latitude'],
            'postcode' => $data['from']['postcode']
        ];

        $this->metres = $data['metres'];
    }

    /**
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return array
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return float
     */
    public function getMetres()
    {
        return $this->metres;
    }

    /**
     * @return float|int
     */
    public function getYards()
    {
        return $this->metres * self::METRE_TO_YARDS;
    }

    /**
     * @return float|int
     */
    public function getMiles()
    {
        return $this->metres * self::METRE_TO_MILE;
    }

    /**
     * @return float|int
     */
    public function getKilometers()
    {
        return $this->metres * self::METRE_TO_KILOMETRE;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'to' => $this->getTo(),
            'from' => $this->getFrom(),
            'metres' => $this->getMetres()
        ];
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode([
            'to' => $this->getTo(),
            'from' => $this->getFrom(),
            'metres' => $this->getMetres()
        ]);
    }

    /**
     * @return string
     */
    public function toCsv()
    {
        $to = $this->getTo();
        $from = $this->getFrom();

        return sprintf('%F,%F,%s,%F,%F,%s,%s', $to['longitude'], $to['latitude'], $to['postcode'], $from['longitude'], $from['latitude'], $from['postcode'], $this->getMetres());
    }
}
