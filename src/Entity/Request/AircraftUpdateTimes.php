<?php

namespace PlaneLogixAPI\Entity\Request;

final class AircraftUpdateTimes extends AbstractRequestEntity
{
    /**
     * TTAF
     *
     * @param int $value
     *
     * @return $this
     */
    public function setTTAFOut(int $value): AircraftUpdateTimes
    {
        $this->requestData['TTAFOut'] = $value;

        return $this;
    }

    /**
     * Tach
     *
     * @param int $value
     *
     * @return $this
     */
    public function setTachOut(int $value): AircraftUpdateTimes
    {
        $this->requestData['TachOut'] = $value;

        return $this;
    }

    /**
     * Hobbs
     *
     * @param int $value
     *
     * @return $this
     */
    public function setHobbsOut(int $value): AircraftUpdateTimes
    {
        $this->requestData['HobbsOut'] = $value;

        return $this;
    }

    /**
     * Date of Service
     *
     * @param string $value
     *
     * @return $this
     */
    public function setServiceDate(string $value): AircraftUpdateTimes
    {
        $this->requestData['ServiceDate'] = $value;

        return $this;
    }

    /**
     * If set to true, new time and cycles will be the time/cycles you send plus the most recent time/cycles recorded.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function setIncrement(bool $value): AircraftUpdateTimes
    {
        $this->requestData['Increment'] = $value;

        return $this;
    }

    /**
     * 5 (cycle value) where CycleTypeID is one of the values provided by the "Get Cycle Types" endpoint and
     * LogbookID is the int value of the logbook you are attempting to update.
     * Hint: LogbookID may be found from the ListAircraft endpoint.
     *
     * @param int  $cycleTypeId
     * @param int  $logbookId
     * @param bool $value
     *
     * @return $this
     */
    public function addCycles(int $cycleTypeId, int $logbookId, bool $value): AircraftUpdateTimes
    {
        $key = sprintf('Cycles[%s][%s]', $cycleTypeId, $logbookId);

        $this->requestData[$key] = $value;

        return $this;
    }

    /**
     * Ignored if increment is true; Fuel Used Left will be used to calculate this.
     *
     * @param int $value
     *
     * @return $this
     */
    public function setFuelRemainingLeft(int $value): AircraftUpdateTimes
    {
        $this->requestData['FuelRemainingLeft'] = $value;

        return $this;
    }

    /**
     * Ignored if increment is true; Fuel Used Right will be used to calculate this.
     *
     * @param int $value
     *
     * @return $this
     */
    public function setFuelRemainingRight(int $value): AircraftUpdateTimes
    {
        $this->requestData['FuelRemainingRight'] = $value;

        return $this;
    }

    public function setFuelPrice(float $value): AircraftUpdateTimes
    {
        $this->requestData['FuelPrice'] = $value;

        return $this;
    }

    /**
     * Fuel Used Left (gal)
     *
     * @param int $value
     *
     * @return $this
     */
    public function setFuelUsedLeft(int $value): AircraftUpdateTimes
    {
        $this->requestData['FuelUsedLeft'] = $value;

        return $this;
    }

    /**
     * Fuel Used Right (gal)
     *
     * @param int $value
     *
     * @return $this
     */
    public function setFuelUsedRight(int $value): AircraftUpdateTimes
    {
        $this->requestData['FuelUsedRight'] = $value;

        return $this;
    }

    /**
     * Heater Hobbs
     *
     * @param int $value
     *
     * @return $this
     */
    public function setHeaterHobbsOut(int $value): AircraftUpdateTimes
    {
        $this->requestData['HeaterHobbsOut'] = $value;

        return $this;
    }
}
