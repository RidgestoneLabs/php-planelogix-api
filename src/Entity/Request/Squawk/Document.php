<?php

namespace PlaneLogixAPI\Entity\Request\Squawk;

use PlaneLogixAPI\Entity\Request\AbstractRequestEntity;
use PlaneLogixAPI\Exception\InvalidArgumentException;
use Psr\Http\Message\StreamInterface;

final class Document extends AbstractRequestEntity
{
    /**
     * The file
     *
     * @param $body
     *
     * @return Document
     */
    public function setUploadFile($body): Document
    {
        $this->requestData['UploadFile'] = $body;

        return $this;
    }

    /**
     * Your aircraft uuid
     *
     * @param string $value
     *
     * @return Document
     */
    public function setAircraftUuid(string $value): Document
    {
        $this->requestData['AircraftUUID'] = $value;

        return $this;
    }

    /**
     * Valid values are ["aircraft-squawk-image", "aircraft-squawk-video"]
     *
     * @param string $value
     *
     * @return Document
     */
    public function setDocType(string $value): Document
    {
        if (!in_array($value, ['aircraft-squawk-image', 'aircraft-squawk-video'])) {
            throw new InvalidArgumentException(sprintf('%s is not a valid doc type.', $value));
        }

        $this->requestData['DocType'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return Document
     */
    public function setAircraftSquawkId(string $value): Document
    {
        $this->requestData['AircraftSquawkID'] = $value;

        return $this;
    }

    /**
     * Add notes, etc. to this document
     *
     * @param string $value
     *
     * @return Document
     */
    public function setSquawkNotes(string $value): Document
    {
        $this->requestData['SquawkNotes'] = $value;

        return $this;
    }
}
