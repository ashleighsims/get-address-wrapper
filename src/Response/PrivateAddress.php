<?php

namespace AshleighSims\GetAddressWrapper\Response;

class PrivateAddress implements ResponseInterface
{
    /**
     * @var string
     */
    private $id;

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
     * PrivateAddress constructor.
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
        $this->id = $data['id'];
        $this->addressLine1 = $data['line1'];
        $this->addressLine2 = $data['line2'];
        $this->addressLine3 = $data['line3'];
        $this->addressLine4 = $data['line4'];
        $this->locality = $data['locality'];
        $this->townOrCity = $data['townOrcity']; // I wish they would correct this parameter...
        $this->county = $data['county'];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
            'id' => $this->getId(),
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
            'id' => $this->getId(),
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
        return sprintf('%s,%s,%s,%s,%s,%s,%s,%s', $this->getId(), $this->getAddressLine1(), $this->getAddressLine2(), $this->getAddressLine3(), $this->getAddressLine4(), $this->getLocality(), $this->getTownOrCity(), $this->getCounty());
    }
}
