<?php

namespace PlaneLogixAPI\Entity\Request\Squawk;

use PlaneLogixAPI\Entity\Request\AbstractRequestEntity;

final class Message extends AbstractRequestEntity
{
    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMessage(string $value): Message
    {
        $this->requestData['Message'] = $value;

        return $this;
    }
}
