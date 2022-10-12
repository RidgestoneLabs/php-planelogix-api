<?php

namespace PlaneLogixAPI\Entity\Request;

final class TrackingItemMarkCompliedWith extends AbstractRequestEntity
{
    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComplianceDate(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['compliancedate'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComplianceDoc(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['compliancedoc'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setComplianceNotes(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['compliancenotes'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setHeaterHobbsOut(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['heaterhobbsout'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setHobbsOut(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['hobbsout'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMxRecordUuid(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['mxrecorduuid'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSelectedMethod(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['selectedmethod'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTachOut(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['tachout'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTtafOut(string $value): TrackingItemMarkCompliedWith
    {
        $this->requestData['ttafout'] = $value;

        return $this;
    }
}
