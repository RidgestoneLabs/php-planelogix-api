<?php

namespace PlaneLogixAPI\Entity\NextDue;

use PlaneLogixAPI\Entity\AbstractEntity;

final class Item extends AbstractEntity
{
    public int $id;

    public string $EventNumber;

    public string $EventTitle;

    public string $EventType;

    public string $EventDescription;

    public string $EventIssuer;

    public ?string $ProductTypeName;

    public string $_rowVariant;

    public string $dueBy;

    public float $dueIn;

    public string $Logbook;
}
