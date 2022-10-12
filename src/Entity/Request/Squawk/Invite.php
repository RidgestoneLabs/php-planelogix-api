<?php

namespace PlaneLogixAPI\Entity\Request\Squawk;

use PlaneLogixAPI\Entity\Request\AbstractRequestEntity;

final class Invite extends AbstractRequestEntity
{
    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEmail(string $value): Invite
    {
        $this->requestData['Email'] = $value;

        return $this;
    }
}
