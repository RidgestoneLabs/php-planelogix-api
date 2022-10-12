<?php

namespace PlaneLogixAPI\Entity\Request;

use PlaneLogixAPI\Entity\AbstractEntity;

class AbstractRequestEntity extends AbstractEntity implements RequestEntityInterface
{
    protected array $requestData = [];

    /**
     * @return array
     */
    public function getRequestData(): array
    {
        return $this->requestData;
    }
}
