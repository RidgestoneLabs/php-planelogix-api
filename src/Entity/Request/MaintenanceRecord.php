<?php

namespace PlaneLogixAPI\Entity\Request;

final class MaintenanceRecord extends AbstractRequestEntity
{
    /**
     * @param int $value
     *
     * @return $this
     */
    public function setLogbookId(int $value): MaintenanceRecord
    {
        $this->requestData['LogbookID'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCRSNumber(string $value): MaintenanceRecord
    {
        $this->requestData['CRSNumber'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWorkOrderNumber(string $value): MaintenanceRecord
    {
        $this->requestData['WorkOrderNumber'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDateOfService(string $value): MaintenanceRecord
    {
        $this->requestData['DateofService'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWorkDescription(string $value): MaintenanceRecord
    {
        $this->requestData['WorkDescription'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopName(string $value): MaintenanceRecord
    {
        $this->requestData['ShopName'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopAddress1(string $value): MaintenanceRecord
    {
        $this->requestData['ShopAddress1'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopAddress2(string $value): MaintenanceRecord
    {
        $this->requestData['ShopAddress2'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopCity(string $value): MaintenanceRecord
    {
        $this->requestData['ShopCity'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopState(string $value): MaintenanceRecord
    {
        $this->requestData['ShopState'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopZip(string $value): MaintenanceRecord
    {
        $this->requestData['ShopZip'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopPhone(string $value): MaintenanceRecord
    {
        $this->requestData['ShopPhone'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopEmail(string $value): MaintenanceRecord
    {
        $this->requestData['ShopEmail'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShopWebsite(string $value): MaintenanceRecord
    {
        $this->requestData['ShopWebsite'] = $value;

        return $this;
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setTTAF(float $value): MaintenanceRecord
    {
        $this->requestData['TTAF'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setHobbs(string $value): MaintenanceRecord
    {
        $this->requestData['Hobbs'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTach(string $value): MaintenanceRecord
    {
        $this->requestData['Tach'] = $value;

        return $this;
    }
}
