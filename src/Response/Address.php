<?php

namespace AshleighSims\GetAddressWrapper\Response;


class Address implements ResponseInterface
{
    /**
     * @var float
     */
    private $longitude;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var string
     */
    private $addressLine1;

    /**
     * @var string
     */
    private $addressLine2;

    /**
     * @var string
     */
    private $addressLine3;

    /**
     * @var string
     */
    private $addressLine4;

    /**
     * @var string
     */
    private $locality;

    /**
     * @var string
     */
    private $townOrCity;

    /**
     * @var string
     */
    private $county;

    /**
     * Address constructor.
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
        $this->longitude = $data['longitude'];
        $this->latitude = $data['latitude'];

        $address = explode(',', $data['addresses'][0]);

        $this->addressLine1 = trim($address[0]);
        $this->addressLine2 = trim($address[1]);
        $this->addressLine3 = trim($address[2]);
        $this->addressLine4 = trim($address[3]);
        $this->locality = trim($address[4]);
        $this->townOrCity = trim($address[5]);
        $this->county = trim($address[6]);
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
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @return string
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @return string
     */
    public function getAddressLine4()
    {
        return $this->addressLine4;
    }

    /**
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @return string
     */
    public function getTownOrCity()
    {
        return $this->townOrCity;
    }

    /**
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'longitude' => $this->getLongitude(),
            'latitude' => $this->getLatitude(),
            'addressLine1' => $this->getAddressLine1(),
            'addressLine2' => $this->getAddressLine2(),
            'addressLine3' => $this->getAddressLine3(),
            'addressLine4' => $this->getAddressLine4(),
            'locality' => $this->getLocality(),
            'townOrCity' => $this->getTownOrCity(),
            'county' => $this->getCounty()
        ];
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode([
            'longitude' => $this->getLongitude(),
            'latitude' => $this->getLatitude(),
            'addressLine1' => $this->getAddressLine1(),
            'addressLine2' => $this->getAddressLine2(),
            'addressLine3' => $this->getAddressLine3(),
            'addressLine4' => $this->getAddressLine4(),
            'locality' => $this->getLocality(),
            'townOrCity' => $this->getTownOrCity(),
            'county' => $this->getCounty()
        ]);
    }

    /**
     * @return string
     */
    public function toCsv()
    {
        return sprintf('%s,%s,%s,%s,%s,%s,%s,%s,%s', $this->getLongitude(), $this->getLatitude(), $this->getAddressLine1(), $this->getAddressLine2(), $this->getAddressLine3(), $this->getAddressLine4(), $this->getLocality(), $this->getTownOrCity(), $this->getCounty());
    }
}
