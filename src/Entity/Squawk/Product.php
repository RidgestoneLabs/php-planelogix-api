<?php

namespace PlaneLogixAPI\Entity\Squawk;

use PlaneLogixAPI\Entity\AbstractEntity;

final class Product extends AbstractEntity
{
    public string $Make;

    public string $Model;

    public string $ProductType;

    public string $PartNumber;
}
