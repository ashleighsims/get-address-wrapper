<?php

namespace AshleighSims\GetAddressWrapper\Response;

class GooglePlace implements ResponseInterface
{
    /**
     * @var string
     */
    private $postcode;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var array
     */
    private $address; // array

    /**
     * GooglePlace constructor.
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
        $this->postcode = $data['postcode'];
        $this->latitude = $data['latitude'];
        $this->longitude = $data['longitude'];
        $this->address = $data['address'];
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return array
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return array
     */
    public function getFormattedAddress()
    {
        return $this->address['formatted_address'];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'postcode' => $this->getPostcode(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'address' => $this->getAddress(),
        ];
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode([
            'postcode' => $this->getPostcode(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'address' => $this->getAddress(),
        ]);
    }

    /**
     * @return string
     */
    public function toCsv()
    {
        return sprintf('%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s',
            $this->getPostcode(),
            $this->getLatitude(),
            $this->getLongitude(),
            $this->getAddress()['thoroughfare'],
            $this->getAddress()['building_name'],
            $this->getAddress()['sub_building_name'],
            $this->getAddress()['sub_building_number'],
            $this->getAddress()['building_number'],
            $this->getAddress()['line1'],
            $this->getAddress()['line2'],
            $this->getAddress()['line3'],
            $this->getAddress()['line4'],
            $this->getAddress()['locality'],
            $this->getAddress()['town_or_city'],
            $this->getAddress()['county'],
            $this->getAddress()['district'],
            $this->getAddress()['country']
        );
    }
}
