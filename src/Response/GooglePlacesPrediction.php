<?php

namespace AshleighSims\GetAddressWrapper\Response;

class GooglePlacesPrediction implements ResponseInterface
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $googlePlaceId;

    /**
     * GooglePlacesPrediction constructor.
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
        $this->description = $data['description'];
        $this->googlePlaceId = $data['google_place_id'];
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
    public function getGooglePlaceId()
    {
        return $this->googlePlaceId;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'description' => $this->getDescription(),
            'google-place-id' => $this->getGooglePlaceId(),
        ];
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode([
            'description' => $this->getDescription(),
            'google-place-id' => $this->getGooglePlaceId(),
        ]);
    }

    /**
     * @return string
     */
    public function toCsv()
    {
        return sprintf('%s,%s', $this->getDescription(), $this->getGooglePlaceId());
    }
}
