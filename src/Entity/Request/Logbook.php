<?php

namespace PlaneLogixAPI\Entity\Request;

final class Logbook extends AbstractRequestEntity
{
    /**
     * Whatever year the logbook make/model was manufactured
     *
     * @param string $value
     *
     * @return $this
     */
    public function setYearOfManufacture(string $value): Logbook
    {
        $this->requestData['yearofmanufacture'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setNotes(string $value): Logbook
    {
        $this->requestData['notes'] = $value;

        return $this;
    }

    /**
     * TTAF @ install/overhaul
     *
     * @param float $value
     *
     * @return $this
     */
    public function setInstallTtaf(float $value): Logbook
    {
        $this->requestData['install_ttaf'] = $value;

        return $this;
    }

    /**
     * Date @ install/overhaul YYYY-MM-DD
     *
     * @param string $value
     *
     * @return $this
     */
    public function setInstallDate(string $value): Logbook
    {
        $this->requestData['installdate'] = $value;

        return $this;
    }

    /**
     * Manufacturer
     *
     * @param string $value
     *
     * @return $this
     */
    public function setMakeOverride(string $value): Logbook
    {
        $this->requestData['MakeOverride'] = $value;

        return $this;
    }

    /**
     * Model
     *
     * @param string $value
     *
     * @return $this
     */
    public function setModelOverride(string $value): Logbook
    {
        $this->requestData['ModelOverride'] = $value;

        return $this;
    }

    /**
     * "Airframe", "Avionics", "Engine", "Left Engine","Left Propeller", etc
     *
     * @param string $value
     *
     * @return $this
     */
    public function setLogbookTypeOverride(string $value): Logbook
    {
        $this->requestData['LogbookTypeOverride'] = $value;

        return $this;
    }

    /**
     * Piston, Jet, Turboprop
     *
     * @param string $value
     *
     * @return $this
     */
    public function setEngineTypeOverride(string $value): Logbook
    {
        $this->requestData['EngineTypeOverride'] = $value;

        return $this;
    }
}
