<?php

namespace PlaneLogixAPI\Entity\Request;

final class TrackingItem extends AbstractRequestEntity
{
    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEventNumber(string $value): TrackingItem
    {
        $this->requestData['EventNumber'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEventTitle(string $value): TrackingItem
    {
        $this->requestData['EventTitle'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEventDescription(string $value): TrackingItem
    {
        $this->requestData['EventDescription'] = $value;

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setEventTypeId(int $value): TrackingItem
    {
        $this->requestData['EventTypeID'] = $value;

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setTTInterval(int $value): TrackingItem
    {
        $this->requestData['TTInterval'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setRecurring(bool $value): TrackingItem
    {
        $this->requestData['Recurring'] = $value ? 'true' : 'false';

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setMonthInterval(int $value): TrackingItem
    {
        $this->requestData['MonthInterval'] = $value;

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setCyclesInterval(int $value): TrackingItem
    {
        $this->requestData['CyclesInterval'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCycleName(string $value): TrackingItem
    {
        $this->requestData['CycleName'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLastPerformedDate(string $value): TrackingItem
    {
        $this->requestData['LastPerformedDate'] = $value;

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setLastPerformedHobbs(int $value): TrackingItem
    {
        $this->requestData['LastPerformedHobbs'] = $value;

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setLastPerformedTach(int $value): TrackingItem
    {
        $this->requestData['LastPerformedTach'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLastPerformedWorkDescription(string $value): TrackingItem
    {
        $this->requestData['LastPerformedWorkDescription'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPcwDate(string $value): TrackingItem
    {
        $this->requestData['PCWDate'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPcwMethod(string $value): TrackingItem
    {
        $this->requestData['PCWMethod'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDNADate(string $value): TrackingItem
    {
        $this->requestData['DNADate'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDNAReason(string $value): TrackingItem
    {
        $this->requestData['DNAReason'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsPrimaryLogbookComponent(bool $value): TrackingItem
    {
        $this->requestData['IsPrimaryLogbookComponent'] = $value ? 'true' : 'false';

        return $this;
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsPrimaryLogbookOverhaul(bool $value): TrackingItem
    {
        $this->requestData['IsPrimaryLogbookOverhaul'] = $value ? 'true' : 'false';

        return $this;
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsPrimaryTrackingItem(bool $value): TrackingItem
    {
        $this->requestData['IsPrimaryTrackingItem'] = $value ? 'true' : 'false';

        return $this;
    }
}
