<?php

namespace PlaneLogixAPI\Entity;

final class AircraftLogbook extends AbstractEntity
{
    public int $id;

    public int $logixId;

    public int $aircraftId;

    public string $uuid;

    public string $logbookType;

    public string $SerialNumber;

    public string $description;
}
