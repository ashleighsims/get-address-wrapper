<?php

namespace AshleighSims\GetAddressWrapper\Response;

class GooglePlacesPostcodePrediction implements ResponseInterface
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $postcode;

    /**
     * GooglePlacesPostcodePrediction constructor.
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
        $this->description = $data['description'];
        $this->postcode = $data['postcode'];
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'description' => $this->getDescription(),
            'postcode' => $this->getPostcode(),
        ];
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode([
            'description' => $this->getDescription(),
            'postcode' => $this->getPostcode(),
        ]);
    }

    /**
     * @return string
     */
    public function toCsv()
    {
        return sprintf('%s,%s', $this->getDescription(), $this->getPostcode());
    }
}
