<?php

namespace PlaneLogixAPI\Entity\Request\Squawk;

use PlaneLogixAPI\Entity\Request\AbstractRequestEntity;

final class Product extends AbstractRequestEntity
{
    /**
     * The id of the product being added
     *
     * @param int $value
     *
     * @return $this
     */
    public function setProductId(int $value): Product
    {
        $this->requestData['ProductID'] = $value;

        return $this;
    }
}
